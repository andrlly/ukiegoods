<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function getUserByEmail(Request $request) {
        return User::where('email', '=', $request->email)->first();
    }

    public function getUserById($id) {
        $user = User::find($id);
        return ['success' => true, 'user' => $user];
    }

    public function authenticate(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return ['user_id' => Auth::id()];
        }
        return ['error' => true];
    }

    public function logout() {
        Auth::logout();
        return ['success' => true];
    }

    public function registration(Request $request) {

        $user = new User();

        $user['name'] = $request->name;
        $user['email'] = $request->email;

        if ($request->password != $request->password_confirmation) {
            return ['error' => true];
        }
        $user['password'] = bcrypt($request->password);
        $user->save();
        return ['user_id' => $user['id']];
    }

}
