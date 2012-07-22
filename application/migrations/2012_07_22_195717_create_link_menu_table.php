<?php

class Create_Link_Menu_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('link_menu', function($table) {
			$table->increments('id');
			$table->integer('link_id');
			$table->integer('menu_id');
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
		//
	}

}