<?php

use App\Http\Controllers\Api\protectcontroller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;




Route::resource('products', ProductController::class);
Route::apiResource('protect',protectcontroller::class);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
