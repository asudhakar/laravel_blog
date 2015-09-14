@extends('layouts.default')
@section('content')
	<h1>Create New User!</h1>

	{{ Form::open(['url' => 'store'], ['class' => 'form-group']) }}

		{{ Form::hidden('userid')}}
		<div>
			{{ Form::label('username', 'Username:') }}
			{{ Form::text('username', null, ['class' => 'form-control']) }}
			{{ $errors->first('username') }}
		</div>

		<div>
			{{ Form::label('email', 'Email:') }}
			{{ Form::email('email', null, ['class' => 'form-control']) }}
			{{ $errors->first('email') }}

		</div>

		<div>
			{{ Form::label('password', 'Password:') }}
			{{ Form::password('password', array('class'=>'form-control' ) ) }}
			{{ $errors->first('password') }}

		</div>

		<div>
			{{ Form::submit('Create User') }}
		</div>
	{{Form::close()}}

@stop