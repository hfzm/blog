@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Posts
                    <a href="{{route('postCreate')}}" class="btn btn-primary btn-sm float-right">Create New Post</a>
                </div>

                <div class="card-body">
                    @foreach($posts as $post)
                        <div class="row justify-content-center">
                            <img src="{{asset('public/posts/images/' . $post->image)}}" alt="image" width="80%">
                            <div class="col-md-10 mt-1">
                                <p><strong>{{$post->title}}</strong></p>
                                <p>{{Str::limit($post->body, 100)}}</p>
                            </div>
                        </div>
                        <div class="row justify-content-center mb-1">
                            <div class="col-md-10">
                                <div class="card">
                                    <div class="card-header">Comments</div>
                                    <div class="card-body">
                                        <p>
                                            <span class="badge badge-pill badge-light">Ali Commented:</span> hey nice pic!
                                        </p>
                                        <p>
                                            <span class="badge badge-pill badge-light">Ali Commented:</span> hey nice pic!
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-md-10">
                                <textarea name="comment" class="form-control mb-1" rows="2" placeholder="Write a comment here..."></textarea>
                                <button class="btn btn-success float-right">Submit Comment</button>
                            </div>
                        </div>
                        <hr>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
