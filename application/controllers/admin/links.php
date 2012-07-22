<?php

class Admin_Links_Controller extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->filter('before', 'role:9')->only(array('delete'));
	}

	public function get_index()
	{
		return Redirect::to_action('admin.menus@all');
	}

	public function get_add($parent)
	{
		$this->layout->page_title   = "Admin - Add Link";
		$this->layout->page_content = View::make('admin.links.add')
			->with('parent', $parent);
	}

	public function post_add()
	{
		$link = new Link;
		$link->name = Input::get('name');
		$link->parent = Input::get('parent');

		$menu = Menu::find(Input::get('menu_id'));
		$menu->links()->insert($link);

		return
			Redirect::to_action('admin.menus@all', array($menu->id))
			->with('flash', true)
			->with('flash_type', 'success')
			->with('flash_msg', 'New link created successfully.');
	}

	public function get_edit($id)
	{
		$link = Link::find($id);
		$this->layout->page_title   = "Admin - Edit Link";
		$this->layout->page_content = View::make('admin.links.edit')->with('link', $link);
	}

	public function post_edit()
	{
		$link = Link::find(Input::get('id'));
		$link->name = Input::get('name');
		$product->short_description = Input::get('short_description');
		$product->slug = Str::slug(Input::get('name'), '_');
		$product->save();

		return
			Redirect::to_action('admin.products@view', array($product->id))
			->with('flash', true)
			->with('flash_type', 'success')
			->with('flash_msg', 'Product updated successfully.');
	}

	public function post_delete()
	{
		$product = Product::find(Input::get('id'));
		$product->categories()->delete();
		$product->delete();
		return
			Redirect::back()
			->with('flash', true)
			->with('flash_type', 'success')
			->with('flash_msg', 'Product deleted successfully.');
	}

}