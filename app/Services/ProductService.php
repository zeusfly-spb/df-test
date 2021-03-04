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

    public function create(array $params)
    {
        $data = Arr::except($params, ['categoryIds']);
        $product = Product::create($data);
        if ($params['categoryIds'] && count($params['categoryIds'])) {
            $product->categories()->sync($params['categoryIds']);
        }
        return new ProductResource($product);
    }

    public function update(array $params)
    {
        $data = Arr::except($params, ['categoryIds']);
        $product = Product::find($params['id'])->update($data);
        if ($params['categoryIds'] && count($params['categoryIds'])) {
            $product->categories()->sync($params['categoryIds']);
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