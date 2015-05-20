<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubaccountsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('subaccounts', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->string('code');

			$table->integer('account_id')->unsigned();
			$table->foreign('account_id')->references('id')->on('accounts');

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
		Schema::drop('subaccounts');
	}

}
