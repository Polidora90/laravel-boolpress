<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\User;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //funzione provvisoria. Non voglio vedere tutti ipost ma solo quelli creati all'utente loggato. No?
        $data = [
            'posts' => Post::orderBy('created_at', 'DESC')->get()
        ];
        return view('admin.posts.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validazione dei dati inseriti
        $request->validate([
            'title'=>'required|max:255',
            'content'=>'required',
        ]);
        $form_data = $request->all();
        $new_post = new Post();
        $new_post->fill($form_data);
        //assegnazione dello user_id fuori dal fill per assicurarmi ch enon venga ipoteticamente inserito da un utente
        $new_post->user_id = $request->user()->id;

        //genera lo slug
        $slug = Str::slug($new_post->title);
        //slug base perchè poi lo slug completo comprenderà il contatore
        $slug_base = $slug;

        //verifico che lo slug generato non esista già nel db
        //tornami il primo post in cui il valore della colonna slug sia uguale allo slug appena creato
        $post_presente = Post::where('slug', $slug)->first();
        $contatore = 1;

        //se trova il post con lo stesso slug entra nel ciclo while
        while ($post_presente) {
            //crea uno slug + il contatore
            $slug = $slug_base . '-' . $contatore;
            $contatore++;
            $post_presente = Post::where('slug', $slug)->first();
            //ovvero: fino a quando trovi uno slug uguale incrementa il contatore
        }

        //ora so che lo slug creato non esiste nel db
        //assegno lo slug
        $new_post->slug = $slug;

        $new_post->save();
        return redirect()->route('admin.posts.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /*
    Funzione che mi torna user undefined
    public function show($slug, Post $post, User $user)
    {
        //grazie alle relazioni tra tabelle trovo l'user e poi passo il dato in $data
        $user = $post->user;
        
        //mostra il primo post where la col 'slug' ha il valore di $slug
        $post = Post::where('slug', $slug)->first();

        if(!$post) {
            abort(404);
        }

        $data = ['post' => $post, 'user' => $user];

        return view('posts.show', $data);
    }
    */
    public function show(Post $post) {
        return view('admin.posts.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $post = Post::where('slug', $slug)->first();

        if(!$post) {
            abort(404);
        }

        $data = ['post' => $post];

        return view('admin.posts.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title'=>'required|max:255',
            'content'=>'required',
        ]);

        $form_data = $request->all();

        //controllo se il titolo in entrata sia diverso dal vecchio titolo
        if ($form_data['title'] != $post->title) {
            //allora devo modificare anche lo slug
            $slug = Str::slug($form_data['title']);
            $slug_base = $slug;
            //verifico che non esista già in db
            $post_presente = Post::where('slug', $slug)->first();
            $contatore = 1;

            while($post_presente) {
                $slug = $slug_base . '-' . $contatore;
                $contatore++;
                $post_presente = Post::where('slug', $slug)->first();
            }
            //assegno lo slug
            $form_data['slug'] = $slug;
        }

        $post->update($form_data);
        return redirect()->route('admin.posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post) 
    {
        $post->delete();
        return redirect()->route('admin.posts.index');
    }
}
