<h2>Todo's</h2>
<ol>
	@foreach($todos as $todo)
		<li>
			<a href="tests/answer/{{ $todo->id }}">{{ $todo->title }}</a> ({{ $todo->subject }})
		</li>
	@endforeach
</ol>