<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDistrictsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('districts', function(Blueprint $table)
		{
			$table->increments('id');

			$table->string('name');
			$table->string('code');
			$table->integer('province_id')->unsigned();
			$table->foreign('province_id')->references('id')->on('provinces');

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
		Schema::drop('districts');
	}

}
