<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->get('/authenticated', function () {
    return true;
});
Route::post('/projekti/fsre_rwa/2020/g07/register', 'App\Http\Controllers\RegisterController@register');
Route::post('/projekti/fsre_rwa/2020/g07/login', 'App\Http\Controllers\LoginController@login');
Route::post('/projekti/fsre_rwa/2020/g07/logout', 'App\Http\Controllers\LoginController@logout');
Route::post('/projekti/fsre_rwa/2020/g07/dodajVjezbu', 'App\Http\Controllers\PostController@napraviPost');

/*Route::get('register', [RegisterController::class, 'register']);
Route::get('login', [RegisterController::class, 'login']);*/
Route::get('/unauthenticated', function () {
    return response()->json(["message" ,"unauthenticated"]);
})->name('api.unauthenticated');

//Route::get('/viewPost/{postId}', 'App\Http\Controllers\PostController@getPostDetails');



Route::get('/projekti/fsre_rwa/2020/g07/getPosts', 'App\Http\Controllers\PostController@getPosts');
Route::get('/projekti/fsre_rwa/2020/g07/viewPost/{id}', 'App\Http\Controllers\PostController@viewPost');
Route::post('/projekti/fsre_rwa/2020/g07/edit/{id}', 'App\Http\Controllers\PostController@editPost');
Route::post('/projekti/fsre_rwa/2020/g07/deletePost/{id}', 'App\Http\Controllers\PostController@deletePost');


