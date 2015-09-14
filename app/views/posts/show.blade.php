@extends('layouts.default')
@section('content')
	<h1>{{ $post->title }}</h1>

	<hr/>

	<h3>{{ $post->content }}</h3>

	<hr/>
	Author:<a href='/users/{{ $user_det->id }}'>{{ $user_det->username }}</a>
	<br/>
	<hr/>
	{{Form::open(['url'=>'store_cmd'])}}
		{{ Form::hidden('post_id',$post->id) }}
		{{ Form::hidden('user_id',$user_det->id) }}
		<div>
			{{ Form::label('comment','Comment:') }}
			{{ Form::text('comment', null, ['class' => 'form-control'], ['rows' => '2']) }}
			{{ $errors->first('comment') }}
		</div>

		<div>
			{{ Form::submit('Comment')}}
		</div>
	{{Form::close()}}



		@foreach($cmd as $command)
			<li>{{ $command->comment }}</li>	
		@endforeach

	







	


	
@stop