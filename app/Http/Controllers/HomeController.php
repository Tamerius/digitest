<?php

namespace App\Http\Controllers;

use Auth;
use App\User as User;
use App\Test as Test;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware("auth");
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::user()->id;

        $user = User::find($user_id);

        $tests = $user->tests_created;

        $todos = Test::where('participant_id', $user_id)->get();
        
        $data = array(
            "tests" => $tests,
            "todos" => $todos
            );

        return view("home", $data);
    }
}
