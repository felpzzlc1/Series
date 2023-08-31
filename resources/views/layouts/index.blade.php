@extends('layouts.app')

@section('content')
    <h1>Resultados da Busca para "{{ $keyword }}"</h1>
    
    @if(count($results) > 0)
        <ul>
            @foreach($results as $result)
                <li><a href="{{ route('posts.show', $result->id) }}">{{ $result->title }}</a></li>
            @endforeach
        </ul>
    @else
        <p>Nenhum resultado encontrado.</p>
    @endif
@endsection
