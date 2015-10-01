@extends('template')

@section('content')

@forelse ($piktos as $pikto)
    <li>
        <a href="/pikto/{{$pikto->id}}">{{ $pikto->title }}</a>
        -
        <a href="/pikto/{{$pikto->id}}/edit">Edit</a>
        -
        {!! Form::open(['route' => ['pikto.destroy', $pikto->id], 'method' => 'delete']) !!}
        <button type="submit" class="btn btn-danger btn-xs">Delete</button>
        {!! Form::close() !!}
    </li>
@empty
    <p>No piktos</p>
@endforelse

<p><a href="/pikto/create">Create a pikto</a></p>

@endsection
