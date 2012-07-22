<?php

class Admin_Menus_Controller extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->filter('before', 'role:9')->only(array('delete'));
	}

	public function get_index()
	{
		return Redirect::to_action('admin.menus@all');
	}

	public function get_all()
	{
		$menus = Menu::get();
		$this->layout->page_title   = "Navigation Management";
		$this->layout->page_content = View::make('admin.menus.all')
			->with('menus', $menus);
	}

	public function get_add($menu_id = 0)
	{
		$this->layout->page_title   = "Admin - Add Menu";
		$this->layout->page_content = View::make('admin.menus.add')
			->with('menu_id', $menu_id);
	}

}