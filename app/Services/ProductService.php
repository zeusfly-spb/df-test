<?php

namespace App\Services;

use App\Product;
use App\Http\Requests\ProductCreateRequest;
use App\Http\Requests\ProductUpdateRequest;

class ProductService
{
    public function index()
    {
        return Product::all();
    }

    public function create(ProductCreateRequest $request)
    {
        return Product::create($request->all());
    }

    public function update(ProductUpdateRequest $request)
    {
        return Product::find($request->id)->update($request->all());
    }

    public function destroy(int $product_id)
    {
        return Product::destroy($product_id);
    }

    public function show(int $product_id)
    {
        return Product::find($product_id);
    }
}