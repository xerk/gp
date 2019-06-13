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

Route::group(['middleware' => 'auth:api'], function() {
    Route::get('/user', 'Api\\UserController@index');
    Route::get('/my-region', 'Api\\UserController@region');
    Route::post('/order', 'Api\\OrderController@store');
    Route::post('/order-web', 'Api\\OrderController@storeOrder');
    Route::get('/show-orders', 'Api\\OrderController@show');
    Route::post('/logout', 'Api\AuthController@logout');
    Route::post('/update-order', 'Api\\OrderController@update');
    Route::post('/edit-profile', 'Api\\UserController@update');
    Route::post('/edit-worker', 'Api\\UserController@updateWorker');
    Route::post('/review', 'Api\\CommentController@store');
    Route::post('/review-web', 'Api\\CommentController@storeWeb');
    Route::post('/check', 'Api\\UserController@checkPassword');
});



Route::get('/categories', 'Api\\CategoryController@index');
Route::get('/category/{id}', 'Api\\CategoryController@show');
Route::get('/cities', 'Api\\CityController@index');
Route::get('/regions', 'Api\\RegionController@index');
Route::get('/workers', 'Api\\WorkerController@index');
Route::get('/workers-web', 'Api\\WorkerController@workers');

Route::post('/login', 'Api\\AuthController@login');
Route::post('/checkEmail', 'Api\\UserController@checkEmail');
Route::post('/register', 'Api\\AuthController@register');
