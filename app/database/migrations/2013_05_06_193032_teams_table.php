<?php

use Illuminate\Database\Migrations\Migration;

class TeamsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Create table
        Schema::create('teams', function($table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->integer('owner_id');

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
        // Drop table
        Schema::drop('teams');
    }

}