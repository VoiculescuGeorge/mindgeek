<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateViewingWindowTable extends Migration {

	public function up()
	{
		Schema::create('viewingWindow', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('title')->nullable();
			$table->string('startDate')->nullable();
			$table->string('wayToWatch')->nullable();
			$table->string('endDate')->nullable();
			$table->string('movie_id');
		});
	}

	public function down()
	{
		Schema::drop('viewingWindow');
	}
}
