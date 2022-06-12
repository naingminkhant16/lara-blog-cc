<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        return view('blogs', [
            "blogs" => Blog::latest()->filter(request(['search']))->get(),
            "categories" => Category::all()
        ]); //eager load
    }

    public function show(Blog $blog)
    {
        return view('blog', [
            "blog" => $blog,
            "randomBlogs" => Blog::inRandomOrder()->take(3)->get()
        ]);
    }
    // protected function getBlogs()
    // {
    // if (request('search')) {
    //     $blogs = $blogs->where('title', "LIKE", "%" . request('search') . "%")
    //         ->orWhere('body', 'LIKE', "%" . request('search') . "%");
    // }
    // $blogs->when(request('search'), function ($query, $search) {
    //     $query->where('title', "LIKE", "%" . $search . "%")
    //         ->orWhere('body', 'LIKE', "%" . $search . "%");
    // });
    // return $blogs->get();
    // }
}
