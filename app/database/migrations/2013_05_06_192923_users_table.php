<?php

use Illuminate\Database\Migrations\Migration;

class UsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// Create users
		Schema::create('users', function($table) {
			$table->increments('id');
			$table->string('name', 100);
			$table->string('username',20)->unique();
			$table->string('password');
			$table->string('email')->unique();

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
		// Drop Users
		Schema::drop('users');
	}

}