<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Http\Resources\ProductCollection;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        if (request()->per_page) {
            $perPage = request()->per_page;
            $fieldName = request()->field_name;
            $keyword = request()->keyword;

            $query = Product::query()
                ->where($fieldName, 'LIKE', "%$keyword%")
                ->orderBy('id', 'asc')
                ->paginate($perPage);

            return new ProductCollection($query);
        } else {
            $product = Product::query()->where('status' ,'Active')->get();

            return new ProductCollection($product);
        }
    }


    public function productSearch()
    {
        $keyword = request()->searchQuery;
        if ($keyword != null) {
            $query = Product::query()
                ->where('name', 'LIKE', "%$keyword%")
                ->orWhere('code', 'LIKE', "%$keyword%")
                ->get();
        }

        return response()->json([
            'data' => @$query ? $query : ''
        ],200);
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
        $product = $product->update($request->all());

        return response()->json([
            'data' => $product,
            'message' => 'Product Created Successfully'
        ]);
    }


    public function destroy(Product $product)
    {
        //
    }
}
