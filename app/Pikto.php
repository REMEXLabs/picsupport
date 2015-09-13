<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pikto extends Model {

	protected $table = 'piktos';
	public $timestamps = true;
	protected $fillable = array('user_id', 'uri');

	public function user()
	{
		return $this->belongsTo('User');
	}

	public function ratings()
	{
		return $this->hasMany('Rating');
	}

}