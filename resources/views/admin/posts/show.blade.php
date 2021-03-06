@extends('layouts.app')

@extends('layouts.partials.admin_navbar')

@section('content')

<div class="container">
    <h2>Dettagli di un post area privata</h2>
    {{-- Qui sarà mostrato il dettaglio di un post scritto dall'utente e potrà essere anche modificato(tramite redirect) o eliminato --}}
     <div class="card mb-3">
        <div class="card-body">
            <h5 class="card-title">{{ $post->title }}</h5>
            <p class="card-text">{{ $post->content }}</p>
            <div>
                <span>Tags:</span>
                @foreach($post->tags as $tag)
                
                    <span class="badge rounded-pill bg-info text-dark">{{ $tag->name }}</span>
                    
                @endforeach
            </div>
            <p class="card-text my-created-at"><small class="text-muted">Categoria: {{ $post->category->name }}</small></p>
            <p class="card-text my-created-at"><small class="text-muted">Creazione: {{ $post->created_at }}</small></p>
            <p class="card-text"><small class="text-muted">Ultima modifica: {{ $post->updated_at }}</small></p>
            <p class="card-text"><small class="text-muted">Utente: {{ $post->user->name }} ({{ $post->user->email }})</small></p>
            @if($post->cover_url) 
            <img src="{{ asset('storage/' . $post->cover_url) }}" class="rounded mx-auto d-block" alt="Post Cover">
            @endif
        </div>

        <a href="{{ route('admin.posts.edit', $post->id) }}">Modifica</a>

        <form action="{{ route('admin.posts.destroy', $post->id) }}" method="post" class="delete-form">
            @csrf
            @method('DELETE')
                    
            <input type="submit" value="Elimina">
        </form>

    </div>
</div>

    
@endsection