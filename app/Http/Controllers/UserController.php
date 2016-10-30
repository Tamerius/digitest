<?php

namespace App\Http\Controllers;

use App\User as User;

use Illuminate\Http\Request;

use App\Http\Requests;

class UserController extends Controller
{
    public function show()
    {
    	$id = Auth::user()->id;

    	$user = User::find($id);

    	$tests = $user->tests_created;
    	
    	$data = array(
    		'tests' => $tests
    		);

    	return view('tests_created', $data);
    }

    public function get_data($name) {
        $user = User::where('name', 'LIKE', '%'.$name.'%')->first();
        if ($user) {
            $data = array(
                'id' => $user->id,
                'name' => $user->name );
            return $data;
        }
    }
}
