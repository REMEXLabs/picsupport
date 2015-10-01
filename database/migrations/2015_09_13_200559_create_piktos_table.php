<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePiktosTable extends Migration {

	public function up()
	{
		Schema::create('piktos', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->string('name', 255)->unique();
			$table->string('title', 255);
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('piktos');
	}
}
