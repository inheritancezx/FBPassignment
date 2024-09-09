<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', ['title' => 'homepage']);
});

Route::get('/about', function () {
    return view('about', ['title' => 'about']);
});

Route::get('/blog', function () {
    return view('blog', ['title' => 'blog']);
});

Route::get('/contact', function () {
    return view('contact', ['title' => 'contact']);
});
