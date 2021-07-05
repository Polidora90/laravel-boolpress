@extends('layouts.app')

@section('content')

<div class="container">
    <h2> {{ __('Ciao ' . Auth::user()->name . ', crea il tuo nuovo post:') }}</h2>

        <form action="{{ route('admin.posts.store') }}" method='post'>
    @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Titolo</label>
            <input type="text" name="title" id="title" class="form-control"> <br>
        </div>
      
        <div class="mb-3">
            <label for="content" class="form-label">Contenuto</label>
            <textarea type="text" name="content" id="content" rows="10" cols="50" class="form-control"> </textarea><br>
        </div>

        <div class="form-group">
            <label>Categoria</label>
            <select name="category_id" class="form-control" @error('category_id') is-invalid @enderror> <option value="">-- seleziona la categoria --</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $category->id == old('category_id') ? 'selected' : '' }}>
                    {{ $category->name }}
                    </option>
                @endforeach
            </select>
        
        </div>


        <input type="submit" value="Invia" class="btn btn-outline-secondary">
    
    </form>



</div>

    
@endsection