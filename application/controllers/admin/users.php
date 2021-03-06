<?php

class Admin_Users_Controller extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->filter('before', 'role:9')->only(array('add', 'all', 'delete'));
	}

	public function get_index()
	{
		return Redirect::to_action('admin.users@all');
	}

	public function get_view($id = NULL)
	{
		$id = $id ?: Auth::user()->id;
		$user = User::find($id);
		$this->layout->page_title		= "Admin - Users - View";
		$this->layout->page_content	= View::make('admin.users.view')->with('user', $user);
	}

	public function get_all()
	{
		$users = User::get();
		$this->layout->page_title		= "User Management";
		$this->layout->page_content	= View::make('admin.users.all')->with('users', $users);
	}

	public function get_password()
	{
		$this->layout->page_title		= "Admin - Change Password";
		$this->layout->page_content	= View::make('admin.users.password');
	}

	public function post_password()
	{
		$user = Auth::user();
		if (Hash::check(Input::get('current_password'), $user->password) && Input::get('new_password') == Input::get('confirm_password'))
		{
			$user->password = Hash::make(Input::get('new_password'));
			$user->save();
			return
				Redirect::to_action('admin.users@view')
				->with('flash', true)
				->with('flash_type', 'success')
				->with('flash_msg', 'Password changed successfully.');
		}
		else
		{
			return
				Redirect::to_action('admin.users@password')
				->with('flash', true)
				->with('flash_type', 'error')
				->with('flash_msg', 'There was an error changing your password.');
		}
	}

	public function get_add()
	{
		$this->layout->page_title		= "Admin - Add user";
		$this->layout->page_content	= View::make('admin.users.add');
	}

	public function post_add()
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
				Redirect::to('admin/users/all')
				->with('flash', true)
				->with('flash_type', 'success')
				->with('flash_msg', 'New user created successfully.');
		}
		else
		{
			return
				Redirect::to('admin/users/add')
				->with('flash', true)
				->with('flash_type', 'error')
				->with('flash_msg', 'Failed to create new user.')
				->with_input();
		}

	}

	public function get_edit($id = NULL)
	{
		// $id = !$id ? Auth::user()->id : $id;
		$id = $id ?: Auth::user()->id;
		$user = User::find($id);
		$this->layout->page_title		= "Admin - Edit User";
		$this->layout->page_content	= View::make('admin.users.edit')->with('user', $user);
	}

	public function post_edit()
	{
		$user = User::find(Input::get('id'));
		$user->firstname = Input::get('firstname');
		$user->surname = Input::get('surname');
		$user->email = Input::get('email');
		$user->save();
		return
			Redirect::to_action('admin.users@view', array($user->id))
			->with('flash', true)
			->with('flash_type', 'success')
			->with('flash_msg', 'User profile updated successfully.');
	}

	public function post_delete()
	{
		$user = User::find(Input::get('id'));
		$user->delete();
		return
			Redirect::to_action('admin.users@all')
			->with('flash', true)
			->with('flash_type', 'success')
			->with('flash_msg', 'User deleted successfully.');
	}

}