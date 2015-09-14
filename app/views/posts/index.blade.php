@extends('layouts.default')
@section('content')

	<h1>All Posts</h1>

	<a href="/create_post">Create a Post</a>

	@if($posts->count())

		@foreach($posts as $post)
			<h2>{{ link_to("/posts/{$post->id}", $post->title) }}</h2>
		@endforeach

	@else

		<p>Unfortunately there is no post found!</p>

	@endif 

@stop