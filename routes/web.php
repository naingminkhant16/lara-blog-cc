<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Models\Comment;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminBlogController;

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

Route::post('/blogs/{blog:slug}/subscription', [BlogController::class, 'subscriptionHandler']);

//admin
Route::get('/admin/blogs', [AdminBlogController::class, 'index'])->middleware('mustAdmin');
Route::get('/admin/blogs/create', [AdminBlogController::class, 'create'])->middleware('mustAdmin');
Route::post('/admin/blogs/store', [AdminBlogController::class, 'store'])->middleware('mustAdmin')->name('blog.store');
Route::delete('/admin/blogs/{blog:slug}/delete', [AdminBlogController::class, 'destory'])->middleware('mustAdmin');
