<?php

class Plauth_Create_Sessions_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pla_sessions', function($table){
            $table->increments('id');
            $table->integer('user_id');
            $table->string('token', 64);
            $table->boolean('active');
            $table->timestamps();
        });
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('pla_sessions');
	}

}