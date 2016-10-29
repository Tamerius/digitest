<h2>My tests</h2>
<ul>
	@foreach($tests as $test)
		<li><a href="/edit/{{ $test->id }}">{{ $test->title }}</a></li>
	@endforeach
</ul>