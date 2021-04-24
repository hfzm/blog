@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Post Details
                </div>

                <div class="card-body">
                    <div class="row justify-content-center">
                        <img src="{{asset('public/posts/images/' . $post->image)}}" alt="image" width="80%">
                        <div class="col-md-10 mt-1">
                            <p><strong>{{$post->title}}</strong></p>
                            <p>{{Str::limit($post->body, 100)}}</p>
                        </div>
                    </div>
                    <get-comments :userid="{{Auth::user()->id}}" :postid="{{$post->id}}"></get-comments>
                    <add-comment :userid="{{Auth::user()->id}}" :postid="{{$post->id}}"></add-comment>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
