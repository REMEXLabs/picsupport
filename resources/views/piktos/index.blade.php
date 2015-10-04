@extends('template')

@section('breadcrumbs')
<ol class="breadcrumb">
  <li class="active">Piktos</li>
</ol>
@endsection

@section('content')

<div class="row">
    <div class="col-md-12">
        <h1>Your Piktos</h1>
    </div>
</div>

<div class="row">

@foreach ($piktos as $pikto)
    <div class="col-md-2">
        <div class="pikto-index--element">
            <a href="/pikto/{{$pikto->id}}" class="center-block text-center">{{ $pikto->title }}</a>
            <img src="http://res.openurc.org/retrieve?name={{$pikto->name}}" alt="{{ $pikto->title }}" class="img-responsive center-block">
        </div>
    </div>
@endforeach

    <div class="col-md-2">
        <div class="pikto-index--element new text-center">
            <a href="/pikto/create" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Create a pikto</a>
        </div>
    </div>

</div>



@endsection
