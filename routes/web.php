<?php

use Illuminate\Support\Facades\Route;

Route::get('/{any}', function () {
    return view('welcome');
})->where('any', '.*');
//URL::forceRootUrl('http://studenti.sum.ba/projekti/fsre_rwa/2020/g7');
Auth::routes();