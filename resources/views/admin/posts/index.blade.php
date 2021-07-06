@extends('layouts.app')

@extends('layouts.partials.admin_navbar')

@section('content')

<div class="container">
    <div class="d-flex justify-content-between">
        <h2>Tutti i post - area privata</h2>
        <a href="{{ route('admin.posts.create') }}" class="btn btn-outline-primary mb-2">Crea un nuovo post</a>
    </div>
    {{-- Qui saranno mostrati i post scritti dall'utente e potranno essere anche modificati o eliminati --}}
    {{-- bisognerebbe fare un filtro per mostrare solo quelli scritti dall'utente --}}
    {{-- fare un link che lo porta all'index pubblico per vedere tutti i post --}}

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Titolo</th>
                <th>Slug</th>
                <th>Categoria</th>
                <th>Utente</th>
                <th class="text-center">Azioni</th>
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
            <tr>
                <td>{{ $post->id }}</td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->slug }}</td>
                <td>{{ $post->category ? $post->category->name : '-' }}</td>
                <td>{{ $post->user->name }}</td>
                <td>
                    <a href="{{ route('admin.posts.show', ['post' => $post ->id]) }}">Dettagli</a>
                    <a href="{{ route('admin.posts.edit', $post->id) }}">Modifica</a>

                    <form action="{{ route('admin.posts.destroy', $post->id) }}" method="post" class="delete-form">
                    @csrf
                    @method('DELETE')
                    
                    <input type="submit" value="Elimina">
                    </form>
                    
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>

    
@endsection