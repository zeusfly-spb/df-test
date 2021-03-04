<?php

namespace App\Services;

use App\Product;
use App\Http\Requests\ProductCreateRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Http\Resources\ProductResource;
use App\Http\Resources\ProductResourceCollection;
use Illuminate\Support\Arr;

class ProductService
{
    public function index()
    {
        return new ProductResourceCollection(Product::all());
    }

    public function create(ProductCreateRequest $request)
    {
        $params = Arr::except($request->all(), ['categoryIds']);
        $product = Product::create($params);
        if ($request->categoryIds && count($request->categoryIds)) {
            $product->categories()->sync($request->categoryIds);
        }
        return new ProductResource($product);
    }

    public function update(ProductUpdateRequest $request)
    {
        $product = Product::find($request->id)->update($request->all());
        if ($request->categoryIds && count($request->categoryIds)) {
            $product->categories()->sync($request->categoryIds);
        }
        return new ProductResource($product);
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