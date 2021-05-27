<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->get('/authenticated', function () {
    return true;
});
Route::post('/register', 'App\Http\Controllers\RegisterController@register');
Route::post('/login', 'App\Http\Controllers\LoginController@login');
Route::post('/logout', 'App\Http\Controllers\LoginController@logout');

/*Route::get('register', [RegisterController::class, 'register']);
Route::get('login', [RegisterController::class, 'login']);*/
Route::get('/unauthenticated', function () {
    return response()->json(["message" ,"unauthenticated"]);
})->name('api.unauthenticated');
