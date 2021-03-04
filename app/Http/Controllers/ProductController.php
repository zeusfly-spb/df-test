<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ProductService;


class ProductController extends Controller
{

    public function index(ProductService $service)
    {
        return response()->json($service->index());
    }


    public function create(Request $request, ProductService $service)
    {
        return response()->json($service->create($request->all()));
    }


    public function show(int $product_id, ProductService $service)
    {
        return response()->json($service->show($product_id));
    }


    public function update(Request $request, ProductService $service)
    {
        return response()->json($service->update($request->all()));
    }

    public function destroy(int $product_id, ProductService $service)
    {
        return response()->json(['result' => $service->destroy($product_id)]);
    }
}
