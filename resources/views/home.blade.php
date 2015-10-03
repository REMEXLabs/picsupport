@extends('template')

@section('content')

<div class="row">
    <div class="col-md-12">
        <h1>Welcome, {{ $user->name }}!</h1>
        <p><a href="/pikto">View your Piktos</a></p>
    </div>
</div>

@endsection
