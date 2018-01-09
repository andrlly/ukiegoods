<?php

namespace App\Http\Controllers;

use App\Config;
use Illuminate\Http\Request;

class ConfigsController extends Controller
{
    public function index(){
//        $config = DB::table('config')->get();
        $config = new Config;
        $config = $config->all();
        return $config;
    }
}
