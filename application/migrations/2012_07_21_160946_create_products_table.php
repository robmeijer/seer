<?php

class Create_Products_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('products', function($table) {
			$table->increments('id');
			$table->string('name', 128);
			$table->string('display_name', 128);
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

		DB::table('products')->insert(array(
			'name'              => 'My Item',
			'display_name'      => 'My Item',
			'slug'              => Str::slug('My Item', '_'),
			'order'             => '1',
			'status'            => '1',
			'short_description'	=> 'This is my item',
			'full_description'	=> 'This is my item and some additional details',
		));
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('products');
	}

}