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

Route::get('/', function () {
    return view('welcome');
});
//login register logout
Route::get('/login', 'AuthController@login')->name('login');
Route::post('/login', 'AuthController@postLogin');
Route::get('/register', 'AuthController@register')->name('register');
Route::post('/register', 'AuthController@postRegister');
Route::get('/logout', 'AuthController@logout')->name('logout');
Route::get('/forget-password', 'AuthController@forgetPassword')->name('forget-password');
Route::post('/forget-password', 'AuthController@postForgetPassword');
Route::get('/reset-password/{token}', 'AuthController@resetPassword')->name('reset-password');

