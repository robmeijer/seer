<?php

class Admin_Auth_Controller extends Base_Controller {

	public $layout = 'layouts.default';
	public $restful = true;

	public function __construct()
	{
		parent::__construct();
		$this->filter('before', 'auth')->except(array('login'));
	}

	public function get_index()
	{
		return Redirect::to('admin/auth/login');
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
			return Redirect::to('/');
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
			return Redirect::to('admin')->with('login_successful', true);;
		}
		else
		{
			return Redirect::to('admin/auth/login')->with_input()->with('login_errors', true);
		}
	}

	public function get_logout()
	{
		Auth::logout();
		return Redirect::to('/');
	}

}
