<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes();

// Rotta landing page guest.home
Route::resource('/', 'GuestController');
//rotta pagamento
Route::any('/payment', 'BraintreeController@token')->name('token');

Route::middleware('auth')
    ->namespace('Admin')
    ->name('admin.')
    ->prefix('admin')
    ->group(function () {
        Route::get('/', 'HomeController@index')->name('index');
        Route::get('/newUser', 'NewUserController@index');
        Route::resource('/user', 'UserController');
        Route::resource('/plate', 'PlateController');
    });

Route::get('/register', 'TypologyController@index')->name('register');



Route::get('{any?}', function () {
    return view('guest.home');
})->where('any', '.*');