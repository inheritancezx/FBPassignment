<?php

use App\Models\post;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', ['title' => 'homepage']);
});

Route::get('/about', function () {
    return view('about', ['title' => 'about']);
});

Route::get('/posts', function () {
    return view('posts', ['title' => 'blog', 'posts' => post::all()]);
});

Route::get('/posts/{slug}', function ($slug) {
    $post = post::find($slug);

    return view('post', ['title' => 'post', 'post' => $post]);
});

Route::get('/contact', function () {
    return view('contact', ['title' => 'contact']);
});
