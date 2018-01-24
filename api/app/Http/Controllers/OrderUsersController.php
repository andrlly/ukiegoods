<?php

namespace App\Http\Controllers;

use App\OrderUser;
use Illuminate\Http\Request;

class OrderUsersController extends Controller
{
    public function getAllUsers() {
        return OrderUser::with('orderProduct')->get();
    }
}
