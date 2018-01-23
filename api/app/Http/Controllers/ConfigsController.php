<?php

namespace App\Http\Controllers;

use App\Config;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ConfigsController extends Controller
{

    public function index(){
        return Config::all();
    }

    public function editConfig(Request $request) {
        $config = Config::find(1);

        $config['body'] = $request->body;
        if ($request->image) {
            Image::make($value = $request->image['value'])->resize(500, 500)->save(public_path('/uploads/conf.jpg'));
        } else $request->image = '';

        $config->save();

        $updated_at = $config['updated_at'];


        return ['success' => true, 'updated_at' => $updated_at];
    }
}