@extends('layouts.app')

@section('content')

<div class="container">
    <h2> {{ __('Ciao ' . Auth::user()->name . ', crea il tuo nuovo post:') }}</h2>

        <form action="{{ route('admin.posts.update') }}" method='post'>
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


        <input type="submit" value="Salva modifiche" class="btn btn-outline-secondary">
    
    </form>

</div>

    
@endsection