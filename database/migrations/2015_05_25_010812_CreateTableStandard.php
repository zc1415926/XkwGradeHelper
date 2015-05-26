<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableStandard extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('standard', function(Blueprint $table)
		{
			$table->increments('id');
			$table->tinyInteger('grade');
			$table->tinyInteger('class');
			$table->tinyInteger('standard-A-up');
			$table->tinyInteger('standard-B-up');
			$table->tinyInteger('standard-B-down');
			$table->tinyInteger('standard-C-up');
			$table->tinyInteger('standard-C-down');
			$table->tinyInteger('standard-D-down');
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
		Schema::drop('standard');
	}

}
