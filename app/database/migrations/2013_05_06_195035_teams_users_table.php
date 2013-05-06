<?php

use Illuminate\Database\Migrations\Migration;

class TeamsUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// Create table
		Schema::create('teams_users', function($table) {
			$table->integer('team_id');
			$table->integer('user_id');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('teams_users');
	}

}