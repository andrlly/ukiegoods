<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

//Route::group(['middleware' => ['auth']], function () {

    // config
    Route::get('/configs', 'ConfigsController@index');

    // body, banner
    Route::put('/config/edit/', 'ConfigsController@editConfig');

    // categories
    Route::get('/categories', 'CategoriesController@getAllCategories');

    Route::post('/categories/add', 'CategoriesController@addCategory');
    Route::put('/categories/edit/{id}', 'CategoriesController@addCategory');
    Route::get('/categories/delete/{id}', 'CategoriesController@deleteCategory');

    // products
    Route::get('/products', 'ProductsController@getAllProducts');
    Route::get('/products/{id}', 'ProductsController@getProductById');

    Route::post('/product/add', 'ProductsController@addProduct');
    Route::put('/product/edit/{id}', 'ProductsController@editProduct');
    Route::get('/product/delete/{id}', 'ProductsController@deleteProduct');

    // user
    Route::post('/user/auth', 'AuthController@authenticate');
    Route::post('/user/register', 'AuthController@register');
    Route::get('/user/logout', 'AuthController@logout');

//});
