@extends('master')

@section('main_content')
	<h2>Create test</h2>
	<form action="/save" method="POST">
		<input type="text" id="test_id" name="id" value="{{ $test->id or '' }}" hidden />
		<label for="title">Title</label>
		<input type="text" id="title" name="title" placeholder="Title" value="{{ $test->title or '' }}" required />
		<label for="subject">Subject</label>
		<input type="text" id="title" name="subject" placeholder="Subject" value="{{ $test->subject or '' }}" required />
		{{ csrf_field() }}

		<h3>Questions</h3>
		<ol>
			<li>
				<input type="text" name="question_1" required value="{{ $question_1->text or '' }}"/>
				@if ($answer_1 && isset($answer_1[0]))
					<p>{{ $answer_1[count($answer_1) - 1]->text }}</p>
				@else
					<p>Not answered yet.</p>
				@endif
			</li>
			<li>
				<input type="text" name="question_2" required value="{{ $question_2->text or '' }}"/>
				@if ($answer_2 && isset($answer_2[0]))
					<p>{{ $answer_2[count($answer_2) - 1]->text }}</p>
				@else
					<p>Not answered yet.</p>
				@endif
			</li>
			<li>
				<input type="text" name="question_3" required value="{{ $question_3->text or '' }}"/>
				@if ($answer_3 && isset($answer_3[0]))
					<p>{{ $answer_3[count($answer_3) - 1]->text }}</p>
				@else
					<p>Not answered yet.</p>
				@endif
			</li>
		</ol>

		<input type="submit" value="Save test" class="btn btn-primary" />
		<button id="delete">Delete test</button>
	</form>
@stop