<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, Blog $blog)
    {
        $formData =  $request->validate([
            'comment' => "required|min:3"
        ]);

        $blog->comments()->create([
            'body' => $formData['comment'],
            'user_id' => Auth::id()
        ]);

        return redirect("blogs/" . $blog->slug);
    }
}
