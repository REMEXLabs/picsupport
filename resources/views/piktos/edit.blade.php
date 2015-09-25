@extends('template')

@section('content')
{!! Form::model($pikto, ['route' => array('pikto.update', $pikto->id), 'method' => 'put']) !!}
	<ul>
		<li>
			{!! Form::label('name', 'Name:') !!}
			{!! Form::text('name') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}
@endsection
