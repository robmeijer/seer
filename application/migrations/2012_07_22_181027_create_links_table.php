<?php

class Create_Links_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('links', function($table) {
			$table->increments('id');
			$table->string('name', 128);
			$table->boolean('parent');
			$table->string('type');
			$table->integer('entity');
			$table->string('url');
			$table->integer('order');
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
		Schema::drop('links');
	}

}