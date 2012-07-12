<?php

class Admin_Categories_Controller extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->filter('before', 'role:9')->only(array('add', 'all', 'delete'));
	}

	public function get_index()
	{
		return Redirect::to_action('admin.categories@all');
	}

	public function get_view($id)
	{
		$category = Category::find($id);
		$this->layout->page_title		= "Admin - Categories - View";
		$this->layout->page_content	= View::make('admin.categories.view')->with('category', $category);
	}

	public function get_all()
	{
		$categories = Category::get();
		$this->layout->page_title		= "Category Management";
		$this->layout->page_content	= View::make('admin.categories.all')->with('categories', $categories);
	}

	public function get_add()
	{
		$this->layout->page_title		= "Admin - Add Category";
		$this->layout->page_content	= View::make('admin.categories.add');
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