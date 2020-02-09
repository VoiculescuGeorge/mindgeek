<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGalleriesTable extends Migration {

	public function up()
	{
		Schema::create('galleries', function(Blueprint $table) {
            $table->string('id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('title')->nullable();
			$table->string('url')->nullable();
			$table->string('thumbnailUrl')->nullable();
			$table->string('gallery_id')->nullable();
            $table->string('movie_id');

            $table->primary('id');
		});
	}

	public function down()
	{
		Schema::drop('galleries');
	}
}
