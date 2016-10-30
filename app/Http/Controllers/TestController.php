<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Auth;
use App\User as User;
use App\Test as Test;
use App\Question as Question;
use App\Answer as Answer;

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

			$participant = User::find($test->participant_id);

			$data = array(
	            'test' => $test,
	            'participant' => $participant
	            );

			return view('saved', $data);
    	}
    	// Create.
    	else {
    		$test = Test::create([
	    		'user_id' => Auth::user()->id,
	    		'title' => $request->input('title'),
	    		'subject' => $request->input('subject'),
	    		'participant_id' => 0
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
    			'test' => $test,
    			'question_1' => $question1,
    			'question_2' => $question2,
    			'question_3' => $question3,
    			'answer_1' => $question1->answers,
    			'answer_2' => $question2->answers,
    			'answer_3' => $question3->answers
    			));
    	}
    }

    public function answer($id) {
    	$test = Test::find($id);

		$questions = $test->questions;
		$question1_id = $questions->where('sub_id', 1)->first()->id;
		$question1 = Question::find($question1_id);
		$question2_id = $questions->where('sub_id', 2)->first()->id;;
		$question2 = Question::find($question2_id);
		$question3_id = $questions->where('sub_id', 3)->first()->id;;
		$question3 = Question::find($question3_id);

    	return view('answer', array(
    		'test' => $test,
			'question_1' => $question1,
			'question_2' => $question2,
			'question_3' => $question3,
			'answer_1' => $question1->answers,
			'answer_2' => $question2->answers,
			'answer_3' => $question3->answers));
    }

    public function invite($test_id, $user_id, $invite) {
    	$test = Test::find($test_id);
    	if ($test) {
	    	$test->participant_id = $invite ? $user_id : 0;
	    	$test->save();
	    	return $invite;
	    }
    }

    public function save_answers(request $request, $id) {
    	$test = Test::find($id);

    	$questions = $test->questions;

		$question1_id = $questions->where('sub_id', 1)->first()->id;
		$question1 = Question::find($question1_id);
		$answer1 = Answer::create([
    		'question_id' => $question1->id,
    		'text' => $request->input('answer_1')
		]);

		$question2_id = $questions->where('sub_id', 2)->first()->id;
		$question2 = Question::find($question2_id);
		$answer2 = Answer::create([
    		'question_id' => $question2->id,
    		'text' => $request->input('answer_2')
		]);
		
		$question3_id = $questions->where('sub_id', 3)->first()->id;
		$question3 = Question::find($question3_id);
		$answer3 = Answer::create([
    		'question_id' => $question3->id,
    		'text' => $request->input('answer_3')
		]);

    	return view('answers', array(
    		'test' => $test,
			'question_1' => $question1,
			'question_2' => $question2,
			'question_3' => $question3,
			'answer_1' => $answer1,
			'answer_2' => $answer2,
			'answer_3' => $answer3));
    }

    public function delete($id) {
    	$test = Test::find($id);

    	if ($test && $test->user_id == Auth::user()->id) {
    		$test->delete();
    		return redirect('home');
    	}
    	else {
    		return 'Access denied';
    	}
    }
}
