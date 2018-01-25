<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function getOrders() {
        return Order::with('product', 'user')->get();
    }

    public function getOrderById($id) {
        return Order::with('product', 'user')->find($id);
    }

    public function addOrder(Request $request) {
        $order = new Order();

        $product = new Product();
        $products = json_decode($request->products);
        foreach ($request->products as $product) {
            $product['name'] = $product->name;
            $product['description'] = $product->description;
            $product['price'] = $product->price;
        }

        $order['products'] = $request->products;
        $order['user_id'] = $request->user_id;
        $order['price'] = 9000;
        $order['quantity'] = 3;

        $order->save();

        return ['success' => true];
    }
}
