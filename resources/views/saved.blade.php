@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ $test->title }} saved succesfully.
                </div>
                <div class="panel-body">
                    <a class="btn btn-primary" href="/home">Back to dashboard</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
