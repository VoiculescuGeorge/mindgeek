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
			$table->boolean('alternative')->nullable()->default(true);
			$table->string('alternative_id')->nullable();
			$table->string('movie_id');
		});
	}

	public function down()
	{
		Schema::drop('videos');
	}
}