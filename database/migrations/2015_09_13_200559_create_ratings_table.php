<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRatingsTable extends Migration {

	public function up()
	{
		Schema::create('ratings', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('pikto_id')->unsigned();
			$table->smallInteger('value')->unsigned();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('ratings');
	}
}