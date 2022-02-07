<?php

use Illuminate\Support\Facades\Route;
use LaraDev\Http\Controllers\PostController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('post/trashed', [PostController::class, 'trashed'])->name('post.trashed');
Route::get('post/{post}/restore', [PostController::class, 'restore'])->name('post.restore');
Route::delete('post/{post}/forceDelete', [PostController::class, 'forceDelete'])->name('post.forceDelete');
Route::resource('post', PostController::class);
