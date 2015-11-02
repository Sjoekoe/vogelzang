<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHorsesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('horses', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->string('breed');
			$table->text('description');
			$table->integer('age');
			$table->integer('gender_id');
			$table->integer('price_id');
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('horses');
	}

}
