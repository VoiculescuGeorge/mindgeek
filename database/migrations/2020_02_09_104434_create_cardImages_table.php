<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCardImagesTable extends Migration {

	public function up()
	{
		Schema::create('cardImages', function(Blueprint $table) {
			$table->increments('id', true);
			$table->timestamps();
			$table->softDeletes();
			$table->string('url')->nullable();
			$table->integer('h')->nullable();
			$table->integer('w')->nullable();
			$table->longText('image')->nullable();
			$table->string('movie_id');
		});
	}

	public function down()
	{
		Schema::drop('cardImages');
	}
}
