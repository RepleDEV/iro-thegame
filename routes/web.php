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

Route::get('/test', 'AjaxLoginController@login');

Route::post('/login', 'AjaxLoginController@login');
Route::post('/signup', 'AjaxLoginController@signup');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
