<h2>My tests</h2>
<ol>
	@foreach($tests as $test)
		<li><a href="/edit/{{ $test->id }}">{{ $test->title }}</a></li>
	@endforeach
</ol>