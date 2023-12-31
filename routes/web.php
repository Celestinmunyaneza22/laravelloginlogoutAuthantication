<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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

Route::get('/register',[AuthController::class,'Register'])->middleware('alreadyLoggedInCheck');
Route::get('/login',[AuthController::class,'Login'])->middleware('alreadyLoggedInCheck');

Route::post('/register-user',[AuthController::class,'RegisterUser'])->name('register-user');
Route::post('/login-user',[AuthController::class,'LoginUser'])->name('login-user');

Route::get('/home',[AuthController::class,'Home'])->middleware('isLoggedIn');

Route::get('/logout',[AuthController::class,'Logout']);