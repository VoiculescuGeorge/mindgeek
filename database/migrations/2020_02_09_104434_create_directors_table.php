<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDirectorsTable extends Migration {

	public function up()
	{
		Schema::create('directors', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('name')->nullable();
			$table->string('movie_id')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('directors');
	}
}