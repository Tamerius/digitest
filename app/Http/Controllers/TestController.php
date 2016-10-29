<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Auth;
use App\Test as Test;
use App\Question as Question;

class TestController extends Controller
{
    //
    public function create() {
		return view('details');
    }

    public function save(request $request) {
    	// TODO validation

    	// Edit.
    	if ($request->input('id')) {
    		// Test
	    	$test = Test::find($request->input('id'));
	    	$test->title = $request->input('title');
			$test->subject = $request->input('subject');
			$test->save();

			$questions = $test->questions;
			$question1_id = $questions->where('sub_id', 1)->first()->id;
			$question1 = Question::find($question1_id);
			$question1->text = $request->input('question_1');
			$question1->save();
			$question2_id = $questions->where('sub_id', 2)->first()->id;;
			$question2 = Question::find($question2_id);
			$question2->text = $request->input('question_2');
			$question2->save();
			$question3_id = $questions->where('sub_id', 3)->first()->id;;
			$question3 = Question::find($question3_id);
			$question3->text = $request->input('question_3');
			$question3->save();

			$data = array(
	            "test" => $test
	            );

			return view('saved', $data);
    	}
    	// Create.
    	else {
    		$test = Test::create([
	    		'user_id' => Auth::user()->id,
	    		'title' => $request->input('title'),
	    		'subject' => $request->input('subject'),
	    		'participants' => 1
			]);

			// Questions
	    	$question_1 = Question::create([
	    		'test_id' => $test->id,
	    		'text' => $request->input('question_1'),
	    		'sub_id' => 1
	    	]);
	    	$question_1->save();
	    	$question_2 = Question::create([
	    		'test_id' => $test->id,
	    		'text' => $request->input('question_2'),
	    		'sub_id' => 2
	    	]);
	    	$question_2->save();
	    	$question_3 = Question::create([
	    		'test_id' => $test->id,
	    		'text' => $request->input('question_3'),
	    		'sub_id' => 3
	    	]);
	    	$question_3->save();

			$data = array(
	            "test" => $test
	            );

			return view('saved', $data);
    	}
    }

    public function edit($id) {
		$test = Test::find($id);
    	if (Auth::user() && $test->user_id == Auth::user()->id) {
    		$questions = $test->questions;
    		$question1_id = $questions->where('sub_id', 1)->first()->id;
			$question1 = Question::find($question1_id);
			$question2_id = $questions->where('sub_id', 2)->first()->id;;
			$question2 = Question::find($question2_id);
			$question3_id = $questions->where('sub_id', 3)->first()->id;;
			$question3 = Question::find($question3_id);

    		return view('details', array(
    			"test" => $test,
    			"question_1" => $question1,
    			"question_2" => $question2,
    			"question_3" => $question3
    			));
    	}
    }
}
