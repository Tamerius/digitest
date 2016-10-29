@extends('master')

@section('main_content')
	<h2>Create test</h2>
	<form action="/save" method="POST">
		<input type="text" name="id" value="{{ $test->id or '' }}" hidden />
		<label for="title">Title</label>
		<input type="text" id="title" name="title" placeholder="Title" value="{{ $test->title or '' }}" required />
		<label for="subject">Subject</label>
		<input type="text" id="title" name="subject" placeholder="Subject" value="{{ $test->subject or '' }}" required />
		{{ csrf_field() }}

		<h3>Questions</h3>
		<ol>
			<li>
				<input type="text" name="question_1" required value="{{ $question_1->text or '' }}"/>
			</li>
			<li>
				<input type="text" name="question_2" required value="{{ $question_2->text or '' }}"/>
			</li>
			<li>
				<input type="text" name="question_3" required value="{{ $question_3->text or '' }}"/>
			</li>
		</ol>

		<input type="submit" value="Save test" />
	</form>
@stop