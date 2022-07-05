<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('plates', 'Api\PlateController@index');
Route::get('typologies', 'Api\TypologyController@index');
Route::get('/users/{slug}', 'Api\RestaurantsController@getPlates');
Route::get('/shipping-price/{id}', 'Api\RestaurantsController@getShippingPrice');
Route::get('/restaurants/filter/{typologies}', 'Api\RestaurantsController@filterRestaurants');

// rotte per la gestione dei pagamenti
Route::get("orders/generate", "Api\Orders\OrderController@generate");
Route::post("orders/make-payment", "Api\Orders\OrderController@makePayment");
