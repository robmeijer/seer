<?php

class Create_Users {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function($table) {
			$table->increments('id');
			$table->string('username', 128);
			$table->string('password', 64);
			$table->string('firstname', 128);
			$table->string('surname', 128);
			$table->string('email', 128);
			$table->integer('role_id');
			$table->timestamps();
		});

		DB::table('users')->insert(array(
			'username'	=> 'admin',
			'password'	=> Hash::make('admin'),
			'firstname'	=> 'Rob',
			'surname'	=> 'Meijer',
			'email'		=> 'rob.meijer@worldstores.co.uk',
			'roll_id'	=> 9
		));
		
		DB::table('users')->insert(array(
			'username'	=> 'matt',
			'password'	=> Hash::make('matt'),
			'firstname'	=> 'Matthew',
			'surname'	=> 'Ward',
			'email'		=> 'matthew.ward@worldstores.co.uk',
			'roll_id'	=> 1
		));
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}