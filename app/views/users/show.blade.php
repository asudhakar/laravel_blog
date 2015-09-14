@extends('layouts.default')
@section('content')
	<h1>Hello, {{ $user->username }}</h1>

	<h2>Your email Id is {{ $user->email }}</h2>
@stop