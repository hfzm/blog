<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        // return $request->all();
        $comment = new Comment;
        $comment->insert([
            'comment'       => $request->comment,
            'user_id'       => $request->user_id,
            'post_id'       => $request->post_id
        ]);

        return response()->json($comment);
    }

    public function getComments(Post $post)
    {
        return response()->json($post->comments()->with('user')->latest()->get());
    }
}
