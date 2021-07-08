<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        //$posts = Post::all();
        //per leggere anche le tabelle associate:
        $posts = Post::with('category')->with('tags')->with('user')->get();

        //devo racchiudere i dati in una chiave per permettere al frontender di trovarli
        //tutte le api devono avere i dati in una chiave dello stesso nome!!
        return response()->json([
            'success'=>true,
            'results'=>$posts
        ]);
    }
}
