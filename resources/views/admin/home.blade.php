@extends('layouts.app')
@extends('layouts.partials.admin_navbar')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Benvenuto ' . Auth::user()->name . '!') }}

                    <p>Il tuo blog contiene {{ $statistics['posts'] }} post.</p>

                    <div>
                        <a href="{{ route('admin.users.index') }}">Il tuo profilo</a>
                    </div>
                </div>
               
            </div>
        </div>
    </div>
</div>
@endsection