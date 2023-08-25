<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    function store(Request $request)
    {
        $comments = new Comment;
        $user_id = Auth::id();
        
        $blog_id = $request->input('blog_id');
        $comment = $request->input('comment');

        $comments->user_id = $user_id;
        $comments->blog_id = $blog_id;
        $comments->comment = $comment;

        $comments->save();
        return redirect('/blog-details/'.$blog_id);
    }
}
