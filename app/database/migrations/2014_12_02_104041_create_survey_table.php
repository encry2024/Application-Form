<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSurveyTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('surveys', function($table) { 
			$table->increments('id');
			$table->string('name');
			$table->timestamps();
			$table->softDeletes();
      
		});
		DB::table('surveys')->insert(
			array(
			'name' => 'On-board Survey',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
			)
		);
		DB::table('surveys')->insert(
			array(
			'name' => 'Training Survey',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
			)
		);
		DB::table('surveys')->insert(
			array(
			'name' => 'Operation Survey',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
			)
		);
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
