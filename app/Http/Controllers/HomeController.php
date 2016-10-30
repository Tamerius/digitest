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

        if ($user->admin == 0) {
            $tests = $user->tests_created;
        }
        else {
            $tests = Test::take(30)->get();
        }

        $todos = Test::where('participant_id', $user_id)->get();
        
        $data = array(
            "admin" => $user->admin == 1,
            "tests" => $tests,
            "todos" => $todos
            );

        return view("home", $data);
    }
}
