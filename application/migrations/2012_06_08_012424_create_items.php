<?php

class Create_Items {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('items', function($table) {
			$table->increments('id');
			$table->string('name', 128);
			$table->string('slug', 128);
			$table->string('code', 128);
			$table->text('features');
			$table->text('short_description');
			$table->text('full_description');
			$table->decimal('price', 10, 4);
			$table->decimal('rrp', 10, 4);
			$table->boolean('status');
			$table->integer('votes');
			$table->integer('points');
			$table->string('template', 255);
			$table->boolean('taxfree');
			$table->string('meta_title', 255);
			$table->string('meta_description', 255);
			$table->string('meta_keywords', 255);
			$table->integer('click_counter');
			$table->timestamps();
		});

		DB::table('items')->insert(array(
			'name'	=> 'Item Name',
			'slug'	=> Str::slug('Item Name'),
			'code'	=> '1',
			'features'	=> '',
			'short_description'	=> '',
			'full_description'	=> '',
			'price'	=> 99.9999,
			'rrp'	=> 99.9999,
			'status'	=> TRUE,
			'votes'	=> 0,
			'points'	=> 0,
			'template'	=> '',
			'taxfree'	=> FALSE,
			'meta_title'	=> '',
			'meta_description'	=> '',
			'meta_keywords'	=> '',
			'click_counter'	=> 0,
		));
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('items');
	}

}