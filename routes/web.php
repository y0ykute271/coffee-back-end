<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/admin',function(){
    return view('quantrivien/login');

});
Route::get('dasboard',function(){
    return view('layout/index');

});


Route::get('danhmuc','Api\CategoryController@index');
Route::get('user','Api\UserController@index');
Route::get('sanpham','Api\ProductController@index');
//
Route::group(['prefix' => 'auth'], function () {
    Route::post('registeradmin', 'Api\AuthController@register');
    Route::post('registerclient', 'Api\AuthController@dangkiclient');
    Route::post('login', 'Api\AuthController@login');
    Route::group(['middleware' => 'auth.jwt'], function () {
        Route::post('/logout', 'Api\AuthController@logout');
    });
});

//
Route::get('/products', 'Api\ProductController@index');

Route::group(['middleware' => 'auth.jwt'], function () {
    Route::group(['middleware' => 'isAdmin'], function () {
        //user
        Route::get('/users', 'Api\UserController@index');
        //category
        Route::get('/categorys', 'Api\CategoryController@index');
        //product
    });
    //user
    Route::post('/users/{id}', 'Api\UserController@showbyId');
    Route::put('users/{id}', 'Api\UserController@editUser');
    Route::delete('users/{id}', 'Api\UserController@deleteUser');
    //category
    Route::post('/categorys', 'Api\CategoryController@addCategory');
    Route::post('/categorys/{id}', 'Api\CategoryController@showbyId');
    Route::put('/categorys/{id}', 'Api\CategoryController@editCategory');
    Route::delete('/categorys/{id}', 'Api\CategoryController@deleteCategory');
    //product
    Route::post('/products', 'Api\ProductController@addProduct');
    Route::post('/products/{id}', 'Api\ProductController@showbyId');
    Route::put('/products/{id}', 'Api\ProductController@editProduct');
    Route::delete('/products/{id}', 'Api\ProductController@deleteProduct');
});
