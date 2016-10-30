@extends('master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
                    <a class="btn btn-primary right" href="/create">Create new test</a>
					@include("tests_created")
                    @include("tests_todo")
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
