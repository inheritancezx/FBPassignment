<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', ['title' => 'homepage']);
});

Route::get('/about', function () {
    return view('about', ['title' => 'about']);
});

Route::get('/posts', function () {
    return view('posts', ['title' => 'blog', 'posts' => [
        [
            'id' => 1,
            'slug' => 'velaris-city-of-starlight',
            'title' => 'velaris; city of starlight',
            'author' => 'not skye',
            'content' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. 
            Nam, hic eum. Magni fugiat necessitatibus quia, ipsa voluptates et. 
            Quod aliquam facere iure obcaecati quisquam voluptates nisi asperiores, 
            cupiditate deserunt dignissimos.'
        ],
        [
            'id' => 2,
            'slug' => 'aretia-city-from-the-fallen',
            'title' => 'aretia; city from the fallen',
            'author' => 'not skye',
            'content' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. 
            Repellendus, totam culpa? Commodi autem veritatis, itaque quia dolorem quidem ducimus, 
            laudantium recusandae consequatur assumenda quas molestiae amet vero impedit ex delectus?'
        ],
        [
            'id' => 3,
            'slug' => 'soberone-city-of-no-city',
            'title' => 'soberone; city of no city',
            'author' => 'himmelya',
            'content' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. 
            Esse, iste provident cupiditate ratione vitae repellat aut vero quidem quasi, 
            sapiente magni consequuntur sint sit numquam adipisci. Commodi, molestiae facilis! Neque.'
        ]
    ]]);
});

Route::get('/posts/{slug}', function ($slug) {
    $posts =[
        [
            'id' => 1,
            'slug' => 'velaris-city-of-starlight',
            'title' => 'velaris; city of starlight',
            'author' => 'not skye',
            'content' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. 
            Nam, hic eum. Magni fugiat necessitatibus quia, ipsa voluptates et. 
            Quod aliquam facere iure obcaecati quisquam voluptates nisi asperiores, 
            cupiditate deserunt dignissimos.'
        ],
        [
            'id' => 2,
            'slug' => 'aretia-city-from-the-fallen',
            'title' => 'aretia; city from the fallen',
            'author' => 'not skye',
            'content' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. 
            Repellendus, totam culpa? Commodi autem veritatis, itaque quia dolorem quidem ducimus, 
            laudantium recusandae consequatur assumenda quas molestiae amet vero impedit ex delectus?'
        ],
        [
            'id' => 3,
            'slug' => 'soberone-city-of-no-city',
            'title' => 'soberone; city of no city',
            'author' => 'himmelya',
            'content' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. 
            Esse, iste provident cupiditate ratione vitae repellat aut vero quidem quasi, 
            sapiente magni consequuntur sint sit numquam adipisci. Commodi, molestiae facilis! Neque.'
        ]
    ];

    $post = Arr::first($posts, function($post) use($slug) {
        return $post['slug'] == $slug;
    });

    return view('post', ['title' => 'post', 'post' => $post]);
});

Route::get('/contact', function () {
    return view('contact', ['title' => 'contact']);
});
