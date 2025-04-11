<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('/v1/auth/signup', RegisterController::class);
Route::post('/v1/auth/signin', LoginController::class);


Route::middleware('auth:sanctum')->group(function () {
    Route::post('/v1/auth/signout', LogoutController::class);
});


Route::middleware('auth:sanctum')->prefix('admin')->group(function () {
});
