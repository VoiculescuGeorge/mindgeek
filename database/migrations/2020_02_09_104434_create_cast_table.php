<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCastTable extends Migration {

	public function up()
	{
		Schema::create('cast', function(Blueprint $table) {
			$table->increments('id', true);
			$table->timestamps();
			$table->softDeletes();
			$table->string('name')->nullable();
			$table->string('movie_id')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('cast');
	}
}