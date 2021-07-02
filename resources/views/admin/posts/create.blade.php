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


        <input type="submit" value="Invia" class="btn btn-outline-secondary">
    
    </form>



</div>

    
@endsection