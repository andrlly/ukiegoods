<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProductsController extends Controller
{
    public function getAllProducts(){
        return Product::with('category')->get();
    }

    public function getProductById($id) {
        return Product::with('category')->find($id);
    }

    public function getProductByIds(Request $request) {
        $ids = explode(',',$request->ids);
        return Product::with('category')->find($ids);
    }

    public function addProduct(Request $request) {
        $product = new Product();

        $product['name'] = $request->name;
        $product['description'] = $request->description;
        $product['price'] = $request->price;
        $product['category_id'] = $request->category_id;

        $product->save();

        if ($request->image) {
            Image::make($request->image['value'])->resize(150, 150)->save(public_path("/uploads/products/{$product['id']}.jpg"));
        }
        return ['success' => true, 'id' => $product['id']];

    }

    public function editProduct(Request $request, $id) {
        $product = Product::find($id);

        $product['name'] = $request->name;
        $product['description'] = $request->description;
        $product['price'] = $request->price;
        $product['category_id'] = $request->category_id;

        $product->save();

        if ($request->image) {
            Image::make($request->image['value'])->resize(150, 150)->save(public_path("/uploads/products/{$product['id']}.jpg"));
        }
        return ['success' => true];
    }

    public function deleteProduct($id)
    {
        Product::find($id)->delete();
        return ['success' => true];
    }
}
