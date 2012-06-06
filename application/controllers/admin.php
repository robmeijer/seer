<?php

class Admin_Controller extends Base_Controller {

	public $layout = 'layouts.default';
	public $restful = true;

	public function __construct()
	{
		parent::__construct();
		$this->filter('before', 'auth')->except(array('login'));
	}
	
	public function get_index()
	{
		$this->layout->page_title		= "Admin";
		$this->layout->page_content	= View::make('admin.index');
	}

	public function get_login()
	{
		$this->layout->page_title		= "Admin - Login";
		$this->layout->page_content	= View::make('admin.login');
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
				Redirect::to('admin');
		}
		else
		{
			return
				Redirect::to('admin/login')
				->with_input()
				->with('login_errors', true);
		}
	}

	public function get_logout()
	{
		Auth::logout();
		
		return
			Redirect::to('/');
	}

	public function get_profile()
	{
		$this->layout->page_title		= "Admin - Profile";
		$this->layout->page_content	= View::make('admin.profile');
	}

}
