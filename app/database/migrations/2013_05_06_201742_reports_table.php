<?php

use Illuminate\Database\Migrations\Migration;

class ReportsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// Create reports table
		Schema::create('reports', function($table) {
			$table->increments('id');
			$table->string('title', 200);
			$table->integer('team_id');
			$table->integer('user_id');

			// created_at and updated_at
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
		// Drop
		Schema::drop('reports');
	}

}