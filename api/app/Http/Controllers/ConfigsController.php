<?php

namespace App\Http\Controllers;

use App\Config;
use Illuminate\Http\Request;

class ConfigsController extends Controller
{
    public function index(){
        return Config::all();
    }

    public function editConfig(Request $request) {
        $config = Config::find(1);

        $config['body'] = $request->body;
        $config['banner'] = $request->banner;


        $config->save();

        return ['success' => true];
    }
}