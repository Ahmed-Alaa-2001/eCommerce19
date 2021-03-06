<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\session;
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

Route::get('/login', function () {
    return view('login');
});
Route::get('/logout', function () {
    Session::forget('user');
    return redirect('login');
});
// Route::view('/product','product');
Route::view('/register','register');
Route::post('/login',[UserController::class,'login']);
Route::post('/register',[UserController::class,'register']);
Route::get('/',[ProductController::class,'Home']);
Route::get('detail/{id}',[ProductController::class,'detail']);
Route::get('search',[ProductController::class,'search']);
Route::post('/add_to_cart',[CartController::class,'add']);//(بتستعيها من ريكوست)تاخد البيانات الي جية من الفورم وتحطها في الداتا بيز
Route::get('/cartlist',[CartController::class,'cartlist']);//(بتستعيها من ريكوست)تاخد البيانات الي جية من الفورم وتحطها في الداتا بيز
Route::get('removecart/{id}/{x}',[CartController::class,'aboutDelete']);
Route::get('removeOrder/{id}/{x}',[CartController::class,'aboutDelete']);
Route::get('ordernow',[OrderController::class,'ordernow']);
Route::post("orderplace",[OrderController::class,'add']);
Route::get('myorders',[OrderController::class,'myOrders']);