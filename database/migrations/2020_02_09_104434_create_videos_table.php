<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVideosTable extends Migration {

	public function up()
	{
		Schema::create('videos', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('title')->nullable();
			$table->string('type')->nullable();
			$table->string('url')->nullable();
			$table->text('thumbnailUrl')->nullable();
			$table->text('image')->nullable();
			$table->text('alternatives')->nullable();
			$table->text('movie_id');
		});
	}

	public function down()
	{
		Schema::drop('videos');
	}
}