<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model {

	protected $table = 'ratings';
	public $timestamps = true;
	protected $fillable = array('pikto_id', 'value');

	public function pikto()
	{
		return $this->belongsTo('App\Pikto');
	}

}
