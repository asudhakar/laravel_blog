@extends('layouts.default')
@section('content')
	
	{{ Form::open(['url'=>'store_post']) }}


		{{ Form::hidden('id',$users->id) }}

		

		<div>
			{{ Form::label('title','Title:')}}
			{{ Form::text('title', null, ['class' => 'form-control'])}}
			{{ $errors->first('title') }}
		</div>

		<div>
			{{ Form::label('content','Content:') }}
			{{ Form::textarea('content', null, ['class' => 'form-control'], ['rows' => '5']) }}
			{{ $errors->first('content') }}
		</div>

		<div>
			{{ Form::submit('Post') }}
		</div>

	{{ Form::close() }}

@stop