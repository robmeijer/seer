<?php

class Admin_Controller extends Base_Controller {

	public $layout = 'layouts.default';
	public $restful = true;

	public function __construct()
	{
		parent::__construct();
		$this->filter('before', 'auth')->except(array('login'));
		$this->filter('before', 'role:9')->only(array('secure', 'create'));
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
				Redirect::to('admin')
				->with('login_successful', true);;
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

	public function get_update()
	{
		$this->layout->page_title		= "Admin - Change Password";
		$this->layout->page_content	= View::make('admin.update');
	}
	
	public function post_update()
	{
		$user = Auth::user();
		if (Hash::check(Input::get('current_password'), $user->password) && Input::get('new_password') == Input::get('confirm_password'))
		{
			$user->password = Hash::make(Input::get('new_password'));
			$user->save();
			return
				Redirect::to('admin/profile')
				->with('update_successful', true);
		}
		else
		{
			return
				Redirect::to('admin/update')
				->with('login_errors', true);
		}
	}

	public function get_secure()
	{
		$this->layout->page_title = "Admin - Secure";
		Section::inject('page_content', '<h1>This is secure and only accessible to Role ID 10.</h1>');
	}

	public function get_create()
	{
		$this->layout->page_title		= "Admin - Create User";
		$this->layout->page_content	= View::make('admin.create');
	}

	public function post_create()
	{
		if (Input::get('password') == Input::get('confirm_password'))
		{
			$user = new User;
			$user->username = Input::get('username');
			$user->password = Hash::make(Input::get('password'));
			$user->firstname = Input::get('firstname');
			$user->surname = Input::get('surname');
			$user->email = Input::get('email');
			$user->role_id = Input::get('role_id');
			$user->save();
			return
				Redirect::to('admin/create')
				->with('create_success', true);
		}
		else
		{
			return
				Redirect::to('admin/create')
				->with('create_errors', true)
				->with_input();
		}
		
	}

	public function get_edit()
	{
		$this->layout->page_title		= "Admin - Edit User";
		$this->layout->page_content	= View::make('admin.edit');
	}

	public function post_edit()
	{
		$user = Auth::user();
		$user->firstname = Input::get('firstname');
		$user->surname = Input::get('surname');
		$user->email = Input::get('email');
		$user->save();
		return
			Redirect::to('admin/profile')
			->with('update_success', true);
	}

	public function get_items()
	{

		$items = Item::paginate(1);

		$this->layout->page_title		= "Admin - All items";
		$this->layout->page_content	= View::make('admin.items')->with('items', $items);
	}

}
