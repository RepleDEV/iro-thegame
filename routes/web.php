<?php

use Illuminate\Contracts\Session\Session;
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
   return Auth::logout();
});

Route::prefix('/ajax_handler')->group(function () {
    Route::get('/', function () {
        return abort(404);
    });
    Route::get('/logout', function () {
        return abort(404);
    });
    Route::get('/login', function () {return abort(404);});
    Route::post('/login', 'AjaxLoginController@login');
    
    Route::post('/win_request','WinController@index');

    Route::post('/logout', 'Auth\LoginController@logout');
    Route::prefix('/get')->group(function () {
        Route::get('/profile', function () {
            if (Auth::check()) {
                return Auth::user();
            } else {
                return response()->json(["err"=>"NOT LOGGED IN"],200);
            }
        });
        Route::get('/leaderboard', 'LeaderboardController@get_leaderboard');
    });
});

// Replaces this
Auth::routes();


