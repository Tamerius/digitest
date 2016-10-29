<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test extends Model {
	protected $table = 'tests';
	protected $fillable = ['user_id', 'title', 'subject', 'participants'];
	public $timestamps = false;

	public function user() {
		return $this->belongsTo('App\User');
	}

	public function questions() {
        return $this->hasMany('App\Question');
    }
}