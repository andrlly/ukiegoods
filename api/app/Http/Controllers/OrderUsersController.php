<?php

namespace App\Http\Controllers;

use App\OrderUser;
use Illuminate\Http\Request;

class OrderUsersController extends Controller
{
    public function getAllUsers() {
        return OrderUser::with('orderProduct')->get();
    }

    public function addOrderUser(Request $request) {
        $user = new OrderUser();

        $user['name'] = $request->name;
        $user['email'] = $request->email;
        $user['comment'] = $request->comment;

        $user->save();

        return ['success' => true, 'id' => $user['id']];
    }
}
