<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use App\Services\ProductService;
use App\Http\Requests\ProductCreateRequest;
use App\Http\Requests\ProductUpdateRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Product[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Http\Response
     */
    public function index(ProductService $service)
    {
        return $service->index();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(ProductCreateRequest $request, ProductService $service)
    {
        return $service->create($request);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(int $product_id, ProductService $service)
    {
        return $service->show($product_id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductUpdateRequest $request, ProductService $service)
    {
        return $service->update($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return int
     */
    public function destroy(int $product_id, ProductService $service)
    {
        return $service->destroy($product_id);
    }
}
