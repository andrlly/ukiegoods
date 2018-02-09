<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use Illuminate\Http\Request;

class OrdersController extends Controller
{

    public function getOrders()
    {
        return Order::with('user', 'products')->get();
    }

    public function getOrder(Order $order, $id)
    {
        return Order::with('user', 'products')->find($id);
    }



    public function addOrder(Request $request) {
//        $orders = [];
//        foreach ($request->data as $product) {
//            $orders = [
//                'user_id' => $request->user_id,
//                'product_id' => $product['id'],
//                'price' => $product['price'],
//                'quantity' => $product['count']
//
//            ];
//
//            Order::insert($orders);
//        }

        foreach ($request->data as $product) {
            $order = new Order();
            $order['user_id'] = $request->user_id;
            $order['product_id'] = $product['id'];
            $order['price'] = $product['price'];
            $order['quantity'] = $product['count'];
            $order->save();
        }

        return ['success' => true];
    }
}
