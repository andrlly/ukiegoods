<?php

namespace App\Http\Controllers;

use App\OrderProduct;
use Illuminate\Http\Request;

class OrderProductsController extends Controller
{
    public function getOrders() {
//        return OrderProduct::with('user', 'product')->get();
    }

    public function getOrderByid($id) {
//        return OrderProduct::with('user', 'product')->find($id);
    }

    public function addOrderProduct(Request $request) {
        $order = new OrderProduct();

        $order['price'] = $request->price;
        $order['count'] = $request->count;
        $order['product_id'] = $request->product_id;
        $order['order_user_id'] = $request->order_user_id;

        $order->save();

        return ['success' => true];

    }
}
