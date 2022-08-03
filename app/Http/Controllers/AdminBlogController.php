<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdminBlogController extends Controller
{

    public function index()
    {
        return view('admin.blogs.index', ['blogs' => Blog::latest()->paginate(6)]);
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

    public function destory(Blog $blog)
    {
        Storage::delete('photos/' . $blog->thumbnail);
        $blog->delete();
        return redirect('/admin/blogs');
    }
}
