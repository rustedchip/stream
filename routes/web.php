<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\AppController;
use App\Http\Controllers\PostController;

Auth::routes([
    'register' => false,
    'reset' => false,
    'verify' => false,
]);

Route::get('/', [AppController::class, 'home'])->name('home');
Route::get('/about', [AppController::class, 'about'])->name('about');
Route::post('/search', [AppController::class, 'stream_search'])->name('stream-search');
Route::get('/search/{query}', [AppController::class, 'stream_search_results'])->name('stream-search-results');

Route::group(['middleware' => 'auth'], function () {
    Route::post('/admin/post/create', [PostController::class, 'create'])->name('create-post');
    Route::get('/admin/post/manage/{post}', [PostController::class, 'manage'])->name('manage-post');
    Route::put('/admin/post/update/{post}', [PostController::class, 'update'])->name('update-post');
    Route::delete('/admin/post/delete/{post}', [PostController::class, 'delete'])->name('delete-post');

    Route::get('/admin/user/password', [AppController::class, 'password'])->name('password');
    Route::put('/admin/user/password/update', [AppController::class, 'password_update'])->name('password-update');
});
