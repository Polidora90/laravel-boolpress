<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() {
        $data = [
            'posts' => Post::all()
        ];
        return view('posts.index', $data);
    }


    public function show($slug)
    {
        //mostra il primo post where la col 'slug' ha il valore di $slug
        $post = Post::where('slug', $slug)->first();

        if(!$post) {
            abort(404);
        }

        $data = ['post' => $post];

        return view('posts.show', $data);
    }
}
