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
                    <form type="post" id="finduser">
                        <input type="text" value="{{ $test->id }}" name="test_id" id="test_id" hidden />
                        <label>
                            Assign to user. <input type="text" id="name_user" name="name_user" autofocus />
                        </label>
                        <input type="submit" value="Search" />
                            @if (isset($participant) && $participant)
                                    <div id="user_found">
                                @else
                                    <div id="user_found" class="hidden">
                                @endif
                            <label>
                                @if (isset($participant) && $participant)
                                    Invite <input type="checkbox" id="invite" checked />
                                @else
                                    Invite <input type="checkbox" id="invite" />
                                @endif
                            </label>
                            @if (isset($participant) && $participant)
                                <span id="user" data-user_id="{{ $participant->id or '' }}">{{ $participant->name or '' }}</span>
                            @else
                                <span id="user"></span>
                            @endif
                            <p id="invited">
                                @if (isset($participant) && $participant)
                                    Invited.
                                @else
                                    Not invited.
                                @endif
                            </p>
                        </div>
                    </form>
                    <a class="btn btn-primary" href="/home">
                        Back to dashboard
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
