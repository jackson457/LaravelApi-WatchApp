<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
Route::get('/category',[ApiController::class,'showCategory']);
Route::get('/product',[ApiController::class,'showProduct']);