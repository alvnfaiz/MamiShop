<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');
//Path: routes\web.php 
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->name('user.')->prefix('user')->group(function () {
    Route::get('/', [App\Http\Controllers\User\UserHomeController::class, 'index'])->name('home');
    Route::get('/home', [App\Http\Controllers\User\UserHomeController::class, 'index'])->name('home');
    Route::get('/profile', [App\Http\Controllers\User\UserHomeController::class, 'profile'])->name('profile');
    Route::get('/settings', [App\Http\Controllers\User\UserHomeController::class, 'settings'])->name('settings');
});