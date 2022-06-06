<?php

use Illuminate\Support\Facades\Route;
use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

Route::get('/', function () {
    // DB::listen(function ($query) {
    //     logger($query->sql);
    // });
    return view('blogs', ["blogs" => Blog::latest()->get()]); //eager load
});

Route::get('/users/{user:username}', function (User $user) {
    return view('blogs', ['blogs' => $user->blogs]);
});

Route::get('/blogs/{blog:slug}', function (Blog $blog) { //Blog::findOrFail(id)
    return view('blog', ["blog" => $blog]);
})->where('blog', '[A-Za-z-_\d]+'); //wildcard-constraint

Route::get('/categories/{category:slug}', function (Category $category) {
    return view('blogs', ["blogs" => $category->blogs]);
});
