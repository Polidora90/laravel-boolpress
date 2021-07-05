@extends('layouts.app')

@extends('layouts.partials.admin_navbar')

@section('content')

<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Slug</th>
                <th>Data Creazione</th>
                {{-- in caso di crud --}}
                {{-- <th class="text-center">Azioni</th> --}}
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>{{ $category->slug }}</td>
                <td>{{ $category->created_at}}</td>
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
