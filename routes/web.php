<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BlogController::class, 'index']);

Route::get('/blogs/{blog:slug}', [BlogController::class, 'show']);

Route::get('/register', [AuthController::class, 'create'])->name('register.create');

Route::post('/register', [AuthController::class, 'store'])->name('register.store');

Route::post('/logout', [AuthController::class, 'logout'])->name('register.logout');

Route::get('/login', [AuthController::class, 'login'])->name('register.login');

Route::post('/login', [AuthController::class, 'postLogin'])->name('register.postLogin');
