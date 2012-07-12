<?php

class Create_Categories_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('categories', function($table) {
			$table->increments('id');
			$table->string('name', 128);
			$table->text('description');
			$table->string('slug', 128);
			$table->timestamps();
		});

		DB::table('categories')->insert(array(
			'name'			=> 'My Category',
			'description'	=> 'This is my category',
			'slug'			=> 'my-category',
		));
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('categories');
	}

}