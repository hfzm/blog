<?php

use Illuminate\Support\Facades\Route;
use App\Post;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $posts = Post::orderBy('id', 'desc')->get();
    return view('welcome', compact('posts'));
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/post/create', 'PostController@create')->name('postCreate');
Route::post('/post/store', 'PostController@store')->name('postStore');
Route::post('/comment/store', 'CommentController@store');
Route::get('/getComments/{post}', 'CommentController@getComments');
Route::get('/unreadNotifications', 'CommentController@unreadNotifications');
Route::get('/markAsRead', 'CommentController@markAsRead');
