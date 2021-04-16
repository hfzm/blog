<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\CommentCreated;
use App\Post;
use App\Comment;
use App\User;
use Auth;

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

        $users = User::all();
        $comment_status = 'New Comment';
        $comment_id = $comment->id;
        $post = Post::findOrFail($request->post_id);

        foreach($users as $user){
            if($user->id !== Auth::user()->id){
                $user->notify(new CommentCreated(Auth::user(), $comment_id, $comment_status, $request->comment, $post->title));
            }
        }

        return response()->json($comment);
    }

    public function getComments(Post $post)
    {
        return response()->json($post->comments()->with('user')->latest()->get());
    }

    public function unreadNotifications()
    {
        $unreadNotifications = Auth::user()->unreadNotifications;
        return response()->json($unreadNotifications);
    }

    public function markAsRead()
    {
        Auth::user()->notifications->markAsRead();
        return response()->json('success');
    }
}
