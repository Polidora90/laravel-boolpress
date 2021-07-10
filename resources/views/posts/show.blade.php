@extends('layouts.app')

@section('content')

<div class="container">
    <h2>Dettagli del post selezionato (public)</h2>
    {{-- Qui vedrò l'articolo interamente --}}

    <div class="card mb-3">
        <div class="card-body">
            <h5 class="card-title">{{ $post->title }}</h5>
            <p class="card-text">{{ $post->content }}</p>
            <p class="card-text my-created-at"><small class="text-muted">Creazione: {{ $post->created_at }}</small></p>
            <p class="card-text"><small class="text-muted">Ultima modifica: {{ $post->updated_at }}</small></p>
            @if($post->cover_url)
            <img src="{{ asset('storage/' . $post->cover_url) }}" class="rounded mx-auto d-block" alt="post cover">
            @endif
            <a href="{{ route('posts.index') }}">...Torna a Tutti i post</a>
        </div>
    </div>
</div>

    
@endsection