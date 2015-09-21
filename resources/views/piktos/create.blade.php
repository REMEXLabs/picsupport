@extends('template')

@section('content')
{!! Form::open(array('route' => 'pikto.store', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('uri', 'Uri:') !!}
			{!! Form::text('uri') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}
@endsection
