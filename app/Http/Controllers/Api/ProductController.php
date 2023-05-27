<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        //
    }


    public function create()
    {
        //
    }


    public function store(ProductRequest $request)
    {
        $product = Product::query()->create($request->all());

        return response()->json([
            'data' => $product,
            'message' => 'Product Created Successfully'
        ]);
    }


    public function show(Product $product)
    {
        //
    }


    public function edit(Product $product)
    {
        //
    }


    public function update(Request $request, Product $product)
    {
        //
    }


    public function destroy(Product $product)
    {
        //
    }
}
