<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Models\Comment;
use Illuminate\Support\Facades\Route;

Route::get('/', [BlogController::class, 'index']);

Route::get('/blogs/{blog:slug}', [BlogController::class, 'show']);

Route::post('/blogs/{blog:slug}/comments/', [CommentController::class, 'store']);

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');

Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'create']);
    Route::post('/register', [AuthController::class, 'store']);

    Route::get('/login', [AuthController::class, 'login']);
    Route::post('/login', [AuthController::class, 'postLogin'])->name('register.postLogin');
});
