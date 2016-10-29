@extends('master')

@section('main_content')
	<h2>Create test</h2>
	<form action="/save" method="POST">
		<input type="text" name="title" placeholder="Title" />
		<input type="text" name="subject" placeholder="Subject" />
		{{ csrf_field() }}
		<input type="submit" />
	</form>
@stop