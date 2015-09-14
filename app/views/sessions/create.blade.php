@extends('layouts.default')
@section('content')
	
	{{ Form::open(['route' => 'session.store']) }}

		<div>
			{{ Form::label('email','Email:')}}
			{{ Form::email('email', null, ['class' => 'form-control']) }}
			{{ $errors->first('email') }}
		</div>


		<div>
			{{ Form::label('password','Password:')}}
			{{ Form::password('password', array('class'=>'form-control' ) ) }}
			{{ $errors->first('password') }}
		</div>

		<div>
			{{ Form::submit('Login') }}
		</div>


	{{ Form::close() }}

@stop