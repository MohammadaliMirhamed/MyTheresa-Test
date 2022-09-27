<?php

namespace App\Http\Resources;

use App\Models\Product;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'sku' => $this->sku,
            'name' => $this->name,
            'category' => $this->category->name,
            'price' => [
                'original' => $this->price,
                'final' => $this->priceFinal,
                'discount_percentage' => $this->getDiscountPercentage($this->priceDiscountPercentage),
                'currency' => Product::DEFAULT_CURRENCY,
            ],
        ];
    }

    /**
     * get discount percentage
     * @return int|null 
     */
    private function getDiscountPercentage($discountPercentage)
    {
        return $discountPercentage > 0
            ? round($discountPercentage) . '%'
            : null;
    }
}
