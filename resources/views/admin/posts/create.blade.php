@extends('layouts.app')
@extends('layouts.partials.admin_navbar')


@section('content')

<div class="container">
    <h2> {{ __('Ciao ' . Auth::user()->name . ', crea il tuo nuovo post:') }}</h2>

        <form action="{{ route('admin.posts.store') }}" method='post' enctype="multipart/form-data">
    @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Titolo</label>
            <input type="text" name="title" id="title" class="form-control"> <br>
        </div>
      
        <div class="mb-3">
            <label for="content" class="form-label">Contenuto</label>
            <textarea type="text" name="content" id="content" rows="10" cols="50" class="form-control"> </textarea><br>
        </div>

        <div class="mb-3">
            {{-- name= nome con cui leggo il file nel controller --}}
            {{-- l'accept non è vincolante, andrebbe definito nel controller --}}
            <label>Immagine di copertina</label> <br>
            <input type="file" name="postCover" accept=".jpeg,.jpg">
        </div>

        <div class="form-group">
            <label>Categoria</label>
            <select name="category_id" class="form-control" @error('category_id') is-invalid @enderror> 
                <option value="">-- seleziona la categoria --</option>

                @foreach($categories as $category)
                    @if ($category->name != 'default')
                    {
                        <option value="{{ $category->id }}" {{ $category->id == old('category_id') ? 'selected' : '' }}>
                        {{ $category->name }}
                        </option>
                    }
                    @endif
                @endforeach
            </select>
            @error('category_id')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        
        </div>

           <div class="form-group">
            <label>Tags</label> <br>

            @foreach($tags as $tag)
            <div class="form-check form-check-inline">
                {{-- input in tag label per avere più area in cui cliccare e non ridurre gli id--}}
                <label class="form-check-label">
                    {{-- [] per specificare che i nom iuguali me li deve unire in un array e non sovrascrivere --}}
                    <input type="checkbox" name="tags[]" class="form-check-input" value="{{ $tag->id }}">
                    
                {{ $tag->name }}
                </label>
            </div>
            @endforeach
        </div>


        <input type="submit" value="Invia" class="btn btn-outline-secondary">

    
    </form>



</div>

    
@endsection