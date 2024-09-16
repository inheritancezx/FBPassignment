<?php

namespace App\Models;

use Illuminate\Support\Arr;

class post {
    public static function all() {
        return [
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
    }

    public static function find($slug) {
        // callback func - putting a func as an args of another func
        // $post = Arr::first(static::all(), function($post) use($slug) {
        //     return $post['slug'] == $slug;
        // });

        // arrow func - just a shorter way
        $post = Arr::first(static::all(), fn($post) => $post['slug'] == $slug);

        if(!$post){
            abort(404);
        } else { return $post; }
    }
}