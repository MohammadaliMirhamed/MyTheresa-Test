<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\BaseController;
use App\Http\Requests\ProductRequest;
use App\Services\ProductService;
use \Illuminate\Http\Response;

class ProductController extends BaseController
{
    const LIMIT = 5;

    public function __construct(
        protected ProductService $productservice
    ){}
    
    /**
     * index method of api / get information form peoduct service
     * @param ProductRequest $productRequest
     * @return Response
     */
    public function index(ProductRequest $productRequest) :Response
    {
        $products = $this->productservice->list($productRequest, self::LIMIT);
        return $this->makeResponse($products['data'], $products['status']);
    }
}
