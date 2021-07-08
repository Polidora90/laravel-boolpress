@extends('layouts.app')

@extends('layouts.partials.admin_navbar')

@section('content')
<div class="container">

    <h2>Il tuo profilo:</h2>

    <ul>
        <li>Nome: {{ Auth::user()->name }}</li>
        <li>Email: {{ Auth::user()->email }}</li>
        <li>Indirizzo: {{ $usersDetails->address }}</li>
        <li>Città: {{ $usersDetails->city }}</li>
        <li>Provincia: {{ $usersDetails->province }}</li>
        <li>CAP: {{ $usersDetails->zip }}</li>
        <li>Data di nascita: {{ $usersDetails->birthDate }}</li>
        <li>Luogo di nascita: {{ $usersDetails->birthCountry }}</li>
        
    </ul>

</div>
    
@endsection