<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model {
	protected $table = 'answers';
	protected $fillable = ['question_id', 'text'];
	public $timestamps = false;

	public function question() {
		return $this->belongsTo('App\Question');
	}
}