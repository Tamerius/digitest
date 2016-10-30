@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2>{{ $test->subject }}</h2>
                </div>
            <div class="panel-body">

			<h3>{{ $test->title }}</h3>
			<ol>
				<li>
					{{ $question_1->text }}
					<p>{{ $answer_1->text }}</p>
				</li>
				<li>
					{{ $question_2->text }}
					<p>{{ $answer_2->text }}</p>
				</li>
				<li>
					{{ $question_3->text }}
					<p>{{ $answer_3->text }}</p>
				</li>
			</ol>
			<a class="btn btn-link" href="/home">
                Back to dashboard
            </a>
		</div>
	</div>
</div>

@endsection