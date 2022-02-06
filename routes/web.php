<?php

use Illuminate\Support\Facades\Route;
use LaraDev\Http\Controllers\PostController;


Route::get('/', function () {
    return view('welcome');
});

Route::resource('post', PostController::class);
