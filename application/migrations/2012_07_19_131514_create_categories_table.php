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
			$table->integer('parent');
			$table->string('name', 128);
			$table->string('slug', 128);
			$table->integer('order');
			$table->boolean('status');
			$table->text('short_description');
			$table->text('full_description');
			$table->string('meta_title', 255);
			$table->string('meta_description', 255);
			$table->string('meta_keywords', 255);
			$table->integer('sort_order');
			$table->timestamps();
		});

		DB::table('categories')->insert(array(
			'name'					=> 'My Category',
			'slug'					=> Str::slug('My Category', '_'),
			'order'					=> '1',
			'status'					=> '1',
			'short_description'	=> 'This is my category',
			'full_description'	=> 'This is my category and some additional details',
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