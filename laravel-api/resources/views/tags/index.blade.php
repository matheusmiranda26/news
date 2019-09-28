@extends('layouts.app')

@section('content')

<div class="container">
    <!-- <h1> {{ $user->name }} </h1> -->
    <h2>Tags</h2>

    @if (count($tags) <= 0)
        <h3>Não existe tags!</h3>
    @else
        <ul>
        @foreach ($tags as $tag)
            <li>#{{ $tag->id }}: {{ $tag->description }}</li>
        @endforeach
        </ul>        
    @endif

</div>
@endsection
