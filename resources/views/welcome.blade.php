<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <!-- Styles -->
        <link href="{{ asset('public/css/app.css') }}" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height" id="app">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="card mt-5">
                                <div class="card-header">
                                    Posts
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
                                                <textarea name="comment" class="form-control mb-1" rows="2" placeholder="Login to read more & write comments..." disabled></textarea>
                                            </div>
                                        </div>
                                        <hr>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Scripts -->
        <script src="{{ asset('public/js/app.js') }}" defer></script>
    </body>
</html>
