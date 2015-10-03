@extends('template')

@section('content')

<div class="row">
    <div class="col-md-12">
        <h1>Your Piktos</h1>
    </div>
</div>

<div class="row">

@foreach ($piktos as $pikto)
    <div class="col-md-2 pikto-index--element">
        <a href="/pikto/{{$pikto->id}}" class="center-block text-center">{{ $pikto->title }}</a>
        <img src="http://res.openurc.org/retrieve?name={{$pikto->name}}&amp;modified=2015-10-01T20:19:02.0Z" alt="{{ $pikto->title }}" class="img-responsive center-block">
    </div>
@endforeach

    <div class="col-md-2 pikto-index--element text-center">
        <a href="/pikto/create" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Create a pikto</a>
    </div>

</div>



@endsection
