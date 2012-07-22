<?php

class Create_Menus_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('menus', function($table) {
			$table->increments('id');
			$table->string('name', 128);
			$table->boolean('default');
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
		Schema::drop('menus');
	}

}