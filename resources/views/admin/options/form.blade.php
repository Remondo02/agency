@extends('admin.base')

@section('title', $option->exists ? 'Editer une option' : 'Créer une option')

@section('content')

    <h1>@yield('title')</h1>

    <form class="vstack gap-2"
        action="{{ route($option->exists ? 'admin.option.update' : 'admin.option.store', $option) }}" method="post">

        @csrf
        @method($option->exists ? 'put' : 'post')

        @include('shared.input', [
            'name' => 'name',
            'label' => 'Nom',
            'value' => $option->name,
        ])

        <div>
            <button class="btn btn-primary">
                @if ($option->exists)
                    Modifier
                @else
                    Créer
                @endif
            </button>
        </div>
    </form>

@endsection
