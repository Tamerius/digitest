@if ($admin)
	<h2>All tests (admin)</h2>
	<label>
		Filter results
		<input type="text" placeholder="Items starting with.." id="search" />
	</label>
@else
	<h2>My tests</h2>
@endif
<ol id="accessible_tests">
	@foreach($tests as $test)
		<li class="test_result" data-title="{{ $test->title }}"><a href="/edit/{{ $test->id }}">{{ $test->title }}</a> ({{ $test->subject }})</li>
	@endforeach
</ol>