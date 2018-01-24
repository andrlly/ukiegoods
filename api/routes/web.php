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
    Route::post('/configs/edit', 'ConfigsController@editConfig');

    // categories
    Route::get('/categories', 'CategoriesController@getAllCategories');

    Route::get('/categories', 'CategoriesController@getAllCategories');
    Route::post('/categories/add', 'CategoriesController@addCategory');
    Route::post('/categories/edit/{id}', 'CategoriesController@editCategory');
    Route::get('/categories/delete/{id}', 'CategoriesController@deleteCategory');

    // products
    Route::get('/products', 'ProductsController@getAllProducts');
    Route::get('/products/{id}', 'ProductsController@getProductById');
    Route::post('/productsArr', 'ProductsController@getProductByIds');

    Route::post('/product/add', 'ProductsController@addProduct');
    Route::post('/product/edit/{id}', 'ProductsController@editProduct');
    Route::get('/product/delete/{id}', 'ProductsController@deleteProduct');

    // user
    Route::post('/user/auth', 'AuthController@authenticate');
    Route::post('/user/registration', 'AuthController@registration');
    Route::get('/user/logout', 'AuthController@logout');
    // attemptAuth from www
    Route::post('/user/getUser', 'AuthController@getUserByEmail');

    // order products
//    Route::get('/orders', 'OrderProductsController@getOrders');
    Route::get('/orders/{id}', 'OrderProductsController@getOrderByid');

    Route::post('/orderproduct/add', 'OrderProductsController@addOrderProduct');

    //order users
//    Route::get('/orderuser/add', 'OrderUsersController@addOrderUser');
    Route::get('/orders', 'OrderUsersController@getAllUsers');

//});



/*

t order_users
t order_products
t products

В t order_products будуть 2 поля з foreign keys:
user_order_id
product_id

моделі відношення one to one, s one to many, залежить що саме витягати
 *
 */