<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    public function index()
    {
        return view('blogs.index', [
            "blogs" => Blog::latest()
                ->filter(request(['search', 'category', 'username']))
                ->paginate(6)
                ->withQueryString()
        ]);
    }

    public function show(Blog $blog)
    {
        return view('blogs.show', [
            "blog" => $blog,
            "randomBlogs" => Blog::inRandomOrder()->take(3)->get()
        ]);
    }

    public function subscriptionHandler(Blog $blog)
    {
        if (Auth::user()->isSubscribed($blog)) {
            $blog->unSubscribe();
        } else {
            $blog->subscribe();
        }
        return redirect()->back();
    }

    public function create()
    {
        return view('blogs.create', ['categories' => Category::all()]);
    }

    public function store()
    {
        $formData =   request()->validate([
            'title' => "required|min:3",
            'slug' => "required|unique:blogs,slug",
            'intro' => "required|min:3",
            'body' => "required|min:3",
            'category_id' => "required|exists:categories,id"
        ]);
        $formData['user_id'] = Auth::id();
        if (request('thumbnail')) {
            $formData['thumbnail'] = request()->file('thumbnail')->store('photos');
        }
        $blog =  Blog::create($formData);
        return redirect('/')->with('status', $blog->title . " is successfully created");
    }
}
