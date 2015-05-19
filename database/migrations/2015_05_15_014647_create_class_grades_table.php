<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassGradesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('class_grades', function(Blueprint $table)
		{
			$table->increments('id');
			$table->tinyInteger('grade', false, true);//unsigned tiny integer
			$table->tinyInteger('class', false, true);//unsigned tiny integer
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
		Schema::drop('class_grades');
	}

}
