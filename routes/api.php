<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\GameController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::put('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('/v1/auth/signup', RegisterController::class);
Route::post('/v1/auth/signin', LoginController::class);


Route::middleware('auth:sanctum')->group(function () {
    Route::post('/v1/auth/signout', LogoutController::class);
    Route::get('/admin', [AdminController::class, 'cekadmin']);
    Route::get('/pengguna', [AdminController::class, 'cekpemain']);
});


Route::get('/v1/games', [GameController::class, 'index']);


Route::middleware('auth:sanctum')->prefix('admin')->group(function () {
});


Route::fallback(function ()

{
    return response()->view('', [], 404);


});