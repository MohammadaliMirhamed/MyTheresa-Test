<?php

namespace App\Services;

use App\Http\Resources\ProductResource;
use App\Infrastructure\Interfaces\Services\ProductServiceInterface;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductService implements ProductServiceInterface
{
    /**
     * return the list of products
     * @param Request $request
     * @param int $limit
     * @return array
     */
    public function list(Request $request, int $limit = 5): array
    {
        $products = Product::query();

        // Can be filtered by category as a query string parameter
        if ($request->has('category')) {
            $products->whereHas('category', function($query) use ($request) {
                $query->where('name', $request->category);
            })->get();
        }

        // Can be filtered by priceLessThan as a query string parameter,
        if ($request->has('priceLessThan')) {
            $products->where('price', '<=', $request->priceLessThan);
        }

        $products->limit($limit);

        return [
            'data' => ProductResource::collection($products->get())
                ->toArray($request),
            'status' => 200
        ];
    }
}
