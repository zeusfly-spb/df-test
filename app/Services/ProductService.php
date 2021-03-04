<?php

namespace App\Services;

use App\Product;
use App\Http\Requests\ProductCreateRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Http\Resources\ProductResource;
use App\Http\Resources\ProductResourceCollection;

class ProductService
{
    public function index()
    {
        return new ProductResourceCollection(Product::all());
    }

    public function create(ProductCreateRequest $request)
    {
        return new ProductResource(Product::create($request->all()));
    }

    public function update(ProductUpdateRequest $request)
    {
        return new ProductResource(Product::find($request->id)->update($request->all()));
    }

    public function destroy(int $product_id)
    {
        return Product::destroy($product_id);
    }

    public function show(int $product_id)
    {
        return new ProductResource(Product::find($product_id));
    }
}