<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Post;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function create()
    {
        return view('post.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'         => ['required'],
            'image'         => ['required'],
            'body'          => ['required']
        ]);

        $post = new Post;

        if($request->hasFile('image')){
            $image          = $request->file('image');
            $image_ext      = $image->getClientOriginalExtension();
            $image_name     = rand(123456, 999999) . '.' . $image_ext;
            $image_path     = public_path('posts/images/');
            $image->move($image_path, $image_name);
            $post->image    = $image_name; 
        }

        $post->user_id      = Auth::user()->id;
        $post->title        = $request->title;
        $post->body         = $request->body;
        $post->save();
        return redirect()->route('home');
    }

    public function show($post_id, $notification_id)
    {
        $notification = Auth::user()->notifications()->find($notification_id);
        if($notification){
            $notification->markAsRead();
        }
        $post = Post::findOrFail($post_id);
        return view('post.show', compact('post'));
    }
}
