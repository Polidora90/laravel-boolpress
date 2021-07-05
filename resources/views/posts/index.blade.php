@extends('layouts.app')

@section('content')

<div class="container">
    <h2>Post pubblici</h2>
    {{-- Qui dovrò stampare le anteprime dei post e aggiungere il tasto "dettagli" per vederlo interamente --}}
    
    @foreach($posts as $post)
    <div class="card mb-3 pt-3">
        <div class="my-img-container">
            <img src="{{ asset('images/placeholder.png') }}" class="card-img-top" alt="placeholder">
        </div>
        <div class="card-body">
            <h5 class="card-title">{{ $post->title }}</h5>
            <p class="card-text">{{Str::limit($post->content, 200)}}</p>
            <a href="{{ route('posts.show', ['slug' => $post->slug]) }}" class="btn btn-outline-secondary btn-sm mb-2">Continua a leggere...</a>
            <p class="card-text my-created-at"><small class="text-muted">Creazione: {{ $post->created_at }}</small></p>
            <p class="card-text my-created-at"><small class="text-muted">Categoria: {{ $post->category ? $post->category->name : '-' }} </small></p>
            <p class="card-text"><small class="text-muted">Ultima modifica: {{ $post->updated_at }}</small></p>
        </div>
    </div>
    @endforeach
  

</div>

    
@endsection
