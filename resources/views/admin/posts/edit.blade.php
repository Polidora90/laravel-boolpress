@extends('layouts.app')

@section('content')

<div class="container">
    <h2> {{ __('Ciao ' . Auth::user()->name . ', modifica qui il tuo post:') }}</h2>

    <form action="{{ route('admin.posts.update', ['post' => $post->id]) }}" method='post'>
    @csrf

    @method('PATCH')

        <div class="mb-3">
            <label for="title" class="form-label">Titolo</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $post->title }}"> <br>
        </div>
      
        <div class="mb-3">
            <label for="content" class="form-label">Contenuto</label>
            <textarea type="text" name="content" id="content" rows="10" cols="50" class="form-control"> {{ $post->content }} </textarea><br>
        </div>

        <div class="form-group">
            <label>Categoria</label>
            <select name="category_id" class="form-control" @error('category_id') is-invalid @enderror>
                <option value="">-- seleziona la categoria --</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $category->id == old('category_id', $post->category_id) ? 'selected' : '' }}>
                    {{ $category->name }}
                    </option>
                    
                @endforeach
            </select>
            @error('category_id')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>


        <input type="submit" value="Salva modifiche" class="btn btn-outline-secondary">
    
    </form>

</div>

    
@endsection