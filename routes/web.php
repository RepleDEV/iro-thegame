<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('index');
});

Route::get('/test', function () {
    return Auth::user();
});

Route::prefix('/ajax_handler')->group(function () {
    Route::get('/', function () {
        return redirect('/');
    });
    Route::post('/logout', function (){
        Auth::logout();
    });
    Route::prefix('/get')->group(function () {
        Route::post('/profile', function () {
            if (Auth::check()) {
                return Auth::user();
            } else {
                return response()->json(["err"=>"NOT LOGGED IN"],200);
            }
        });
    });
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
