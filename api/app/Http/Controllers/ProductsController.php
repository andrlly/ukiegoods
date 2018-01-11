<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function getAllProducts(){
        return Product::all();
    }

    public function getProductById($id) {
        return Product::find($id);
    }

    public function addProduct(Request $request) {
        $product = new Product();

        $product['name'] = $request->name;
        $product['slug'] = str_slug($request->name, '-');
        $product['description'] = $request->description;
        $product['count'] = $request->count;
        $product['category_id'] = $request->category;

        $product->save();
        return ['success' => true];

    }

    public function editProduct(Request $request, $id) {
        $product = Product::find($id);

        $product['name'] = $request->name;
        $product['slug'] = str_slug($request->name, '-');
        $product['description'] = $request->description;
        $product['count'] = $request->count;
        $product['category_id'] = $request->category;

        $product->save();
        return ['success' => true];
    }

    public function deleteProduct($id)
    {
        Product::find($id)->delete();
        return ['success' => true];
    }
}
