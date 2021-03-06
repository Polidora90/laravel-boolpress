@extends('layouts.app')

@extends('layouts.partials.admin_navbar')

@section('content')
<div class="container">
    <h2>Tutti i tags</h2>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Slug</th>
                <th>Numero Post</th>
                <th>Data Creazione</th>
                {{-- in caso di crud --}}
                {{-- <th class="text-center">Azioni</th> --}}
            </tr>
        </thead>
        <tbody>
            @foreach($tags as $tag)
            <tr>
                <td>{{ $tag->id }}</td>
                <td>{{ $tag->name }}</td>
                <td>{{ $tag->slug }}</td>
                {{-- posso usare il count perchè la proprietà tra parentesi ci torna tutti i post esistenti di quella categoria sottoforma di array --}}
                <td>
                    <a href="{{ route('admin.posts.filter', ['tag'=>$tag->id]) }}" class="btn btn-outline-dark">{{ count($tag->posts) }}</a>
                </td>
                <td>{{ $tag->created_at}}</td>
                {{-- <td>
                    <a href="{{ route('admin.posts.show', ['post' => $post ->id]) }}">Dettagli</a>
                    <a href="{{ route('admin.posts.edit', $post->slug) }}">Modifica</a>

                    <form action="{{ route('admin.posts.destroy', $post->id) }}" method="post" class="delete-form">
                    @csrf
                    @method('DELETE')
                    
                    <input type="submit" value="Elimina">
                    </form>
                    
                </td> --}}
            </tr>
            @endforeach
        </tbody>
    
    </table>
</div>
    
@endsection