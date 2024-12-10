@extends('base')

@section('title', 'Se connecter')

@section('content')

    <div class="mt-4 container">
        <h1>@yield('title')</h1>

        @include('shared.flash')

        <form method="post" action="{{ route('login') }}" class="vstack gap-3">
            @csrf
            @include('shared.input', [
                'type' => 'email',
                'class' => 'col',
                'name' => 'email',
                'label' => 'Email',
            ])
            @include('shared.input', [
                'type' => 'password',
                'class' => 'col',
                'name' => 'password',
                'label' => 'Mot de passe',
            ])
            <div>
                <button class="btn btn-primary">Se connecter</button>
            </div>
        </form>
    </div>
@endsection
