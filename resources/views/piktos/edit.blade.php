@extends('template')

@section('content')
{!! Form::model($pikto, ['route' => array('pikto.update', $pikto->id), 'method' => 'put']) !!}
	<ul>
		<li>
			{!! Form::label('title', 'Title:') !!}
			{!! Form::text('title') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}
@endsection
