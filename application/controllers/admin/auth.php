<?php

class Admin_Auth_Controller extends Frontend_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function get_index()
	{
		return Redirect::to_action('admin.auth@login');
	}

	public function get_login()
	{
		if (Auth::guest())
		{
			$this->layout->page_title = "Admin - Login";
			$this->layout->page_content = View::make('admin.auth.login');
		}
		else
		{
			return Redirect::to_action('admin.dashboard@index');
		}
	}

	public function post_login()
	{
		$credentials = array(
			'username' => Input::get('username'),
			'password' => Input::get('password'),
			'remember' => Input::get('remember')
		);

		if (Auth::attempt($credentials))
		{
			return
				Redirect::to_action('admin.dashboard@index');
				->with('flash', true)
				->with('flash_type', 'success')
				->with('flash_msg', 'Logged in successfully.');
		}
		else
		{
			return
				Redirect::back()->
				with_input()
				->with('flash', true)
				->with('flash_type', 'error')
				->with('flash_msg', 'Incorrect username or password.');
		}
	}

	public function get_logout()
	{
		Auth::logout();
		return Redirect::home();
	}

}