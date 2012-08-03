<?php

class Create_Attributevalues_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('attributevalues', function($table) {
			$table->increments('id');
			$table->string('value', 128);
			$table->string('code', 128);
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
		Schema::drop('attributevalues');
	}

}