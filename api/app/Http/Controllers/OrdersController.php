<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use Illuminate\Http\Request;

class OrdersController extends Controller
{

    public function order(Order $order, $id)
    {
        $data = $order->with('products')->find($id);
        return $data;
    }



//    public function addOrder(Request $request) {
//        $order = new Order();
//
//        $prds = [];
//        $products = json_decode($request->products, true);
//        foreach ($products as $product) {
//             array_push($prds, $product['id']);
//        }
//        $order['products'] = json_encode($prds);
//        $order['user_id'] = $request->user_id;
//        $order['price'] = 7000;
//        $order['quantity'] = 3;
////
//        $order->save();
//
//        return ['success' => true, 'product' => $prds];
//    }
}
