<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubscribtionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('subscriptions', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('roster_id')->unsigned();
            $table->foreign('roster_id')->references('id')->on('rosters')->onDelete('cascade');
            $table->integer('rider_id')->unsigned();
            $table->foreign('rider_id')->references('id')->on('riders')->onDelete('cascade');
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
		Schema::drop('subscriptions');
	}

}
