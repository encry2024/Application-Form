<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionnairesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		//
			Schema::create('questionnaires', function($table) { 
			$table->increments('id');
			$table->integer('survey_id')->unsigned();
			$table->string('question');
			$table->string('type');
			$table->string('group');
			$table->string('choice_r1');
			$table->string('choice_r2');
			$table->string('choice_r3');
			$table->string('choice_r4');
			$table->string('choice_r5');
			$table->string('choice_cb1');
			$table->string('choice_cb2');
			$table->string('choice_cb3');
			$table->string('choice_cb4');
			$table->string('choice_cb5');
			$table->timestamps();
			$table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}

}
