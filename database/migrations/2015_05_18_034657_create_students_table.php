<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//把sqlsrv里的数据转存到mysql里一份，并预留打等级的位置
		Schema::create('students', function(Blueprint $table)
		{
			$table->increments('id');
			$table->tinyInteger('grade', false, true);//unsigned tiny integer 0-255
			$table->tinyInteger('class', false, true);//unsigned tiny integer 0-255
			$table->string('name');
			$table->smallInteger('score');
			$table->smallInteger('attitude');
			$table->smallInteger('sum');
			$table->string('score_to_grade');
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
		Schema::drop('students');
	}

}
