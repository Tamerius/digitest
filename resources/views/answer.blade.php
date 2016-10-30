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
			<form method="get" action="/answers/{{ $test->id }}">
				<ol>
					<li>
						<label>
							{{ $question_1->text }}
							<div>
								<input type="text" name="answer_1" value="{{ $answer_1[count($answer_1) - 1]->text or '' }}" required />
							</div>
						</label>
					</li>
					<li>
						<label>
							{{ $question_2->text }}
							<div>
								<input type="text" name="answer_2" value="{{ $answer_2[count($answer_2) - 1]->text or '' }}" required />
							</div>
						</label>
					</li>
					<li>
						<label>
							{{ $question_3->text }}
							<div>
								<input type="text" name="answer_3" value="{{ $answer_3[count($answer_3) - 1]->text or '' }}" required />
							</div>
						</label>
					</li>
				</ol>
				<a class="btn btn-link" href="/home">
                    Back to dashboard
                </a>
				<input type="submit" value="Save" />
			</form>
		</div>
	</div>
</div>

@endsection