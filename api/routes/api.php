<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

// config
Route::get('/configs', 'ConfigsController@index');

// categories
Route::get('/categories', 'CategoriesController@getAllCategories');

// products
Route::get('/products', 'ProductsController@getAllProducts');
Route::get('/products/{id}', 'ProductsController@getProductById');