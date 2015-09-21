{!! Form::open(array('route' => 'rating.store', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('pikto_id', 'Pikto_id:') !!}
			{!! Form::text('pikto_id') !!}
		</li>
		<li>
			{!! Form::label('value', 'Value:') !!}
			{!! Form::text('value') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}
