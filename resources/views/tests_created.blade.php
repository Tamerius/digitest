@extends('master')

@section('main_content')
	<h2>My tests</h2>
	@foreach($tests as $test)
		<p>{{ $test->title }}</p>
	@endforeach
@stop