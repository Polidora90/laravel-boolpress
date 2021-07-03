@extends('layouts.app')

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
                <th class="text-center">Azioni</th>
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
            <tr>
                <td>{{ $post->id }}</td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->slug }}</td>
                <td>-</td>
                <td>
                    <a href="#">Dettagli</a>
                    <a href="#">Modifica</a>
                    <a href="#">Elimina</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    
    </table>


</div>

    
@endsection