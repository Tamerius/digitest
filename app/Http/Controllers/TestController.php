<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class TestController extends Controller
{
    //
    public function create() {
		return view('create');
    }

    public function save(request $request) {
    	//echo $request->input('title');
    }
}
