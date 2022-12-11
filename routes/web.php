<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\WatchController;
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
Route::get('/admin/logout',[AuthController::class,'logout']);
Route::get('admin/login',[AuthController::class,'showLogin']);
Route::post('/admin/login',[AuthController::class,'postLogin']);
Route::group(['prefix'=>'admin','middleware' => ['AdminAuth']],function(){
    Route::get('/',[AdminController::class,'index']);
    Route::resource('category',CategoryController::class);
    Route::resource('watch',WatchController::class);
});