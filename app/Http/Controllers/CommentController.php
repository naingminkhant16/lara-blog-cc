<?php

namespace App\Http\Controllers;

use App\Mail\SubscriberMail;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class CommentController extends Controller
{
    public function store(Request $request, Blog $blog)
    {
        $formData =  $request->validate([
            'comment' => "required|min:3"
        ]);
        $comment =  $blog->comments()->create([
            'body' => $formData['comment'],
            'user_id' => Auth::id()
        ]);

        $subscribers = $blog->subscribers->filter(fn ($subscriber) => $subscriber->id !== Auth::id());

        $subscribers->each(function ($subscriber) use ($blog, $comment) {
            Mail::to($subscriber->email)->queue(new SubscriberMail($blog, $comment->body));
        });

        return redirect("blogs/" . $blog->slug);
    }
}
