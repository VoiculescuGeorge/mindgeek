<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMovieTable extends Migration {

	public function up()
	{
		Schema::create('movie', function(Blueprint $table) {
            $table->string('id');
			$table->timestamps();
			$table->softDeletes();
			$table->text('body')->nullable();
			$table->string('cert')->nullable();
			$table->string('class')->nullable();
			$table->integer('duration')->nullable();
			$table->string('headline')->nullable();
			$table->string('quote')->nullable();
            $table->integer('rating')->nullable();
            $table->string('lastUpdated');
			$table->string('reviewAuthor')->nullable();
			$table->string('skyGoId')->nullable();
			$table->string('skyGoUrl')->nullable();
			$table->string('sum')->nullable();
			$table->text('synopsis')->nullable();
			$table->string('url')->nullable();
			$table->string('year')->nullable();
            $table->text('genres')->nullable();

            $table->primary('id');
		});
	}

	public function down()
	{
		Schema::drop('movie');
	}
}
