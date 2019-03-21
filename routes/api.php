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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// route groups allows urls to have the same behavior

Route::group(['prefix'=>'v1'], function(){
    // Route::get('products', ['as'=>'products', function(){
    //     return App\Product::all();
    // }]);
    Route::resource('products', 'ProductController', ['only'=>['index', 'store', 'update']]);
    Route::resource('products.descriptions', 'ProductDescriptionController', ['only'=>['index', 'store' ]]);
});
