<?php

class Admin_Categories_Controller extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->filter('before', 'role:9')->only(array('delete'));
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
		$this->layout->page_content	= View::make('admin.categories.all')
		->with('categories', $categories)
		->with('parent', 0);
	}

	public function get_list($id = 0)
	{
		$categories = Category::where('parent', '=', $id)->get();
		$grandparent = NULL;
		$grandparent_name = NULL;
		$category_name = "Top";
		if ($id)
		{
			$category = Category::find($id);
			$grandparent = $category->parent != 0 ?: NULL;
			if ($grandparent != 0)
			{
				$grandparent_name = Category::find($grandparent)->name;
			}
			$category_name = $category->name;
		}
		
		$this->layout->page_title		= "Admin - Categories - List";
		$this->layout->page_content	= View::make('admin.categories.list')
		
		->with('categories', $categories)
		->with('parent', $id)
		->with('grandparent', $grandparent)
		->with('grandparent_name', $grandparent_name)
		->with('category_name', $category_name);
	}

	public function get_add($parent)
	{
		$this->layout->page_title		= "Admin - Add Category";
		$this->layout->page_content	= View::make('admin.categories.add')
		->with('parent', $parent);
	}

	public function post_add()
	{
		$category = new Category;
		$category->name = Input::get('name');
		$category->short_description = Input::get('short_description');
		$category->slug = Str::slug(Input::get('name'), '_');
		$category->parent = Input::get('parent');
		$category->save();
		return
			Redirect::to_action('admin.categories@list', array($category->parent))
			->with('flash', true)
			->with('flash_type', 'success')
			->with('flash_msg', 'New category created successfully.');
	}

	public function get_edit($id)
	{
		$category = Category::find($id);
		$this->layout->page_title		= "Admin - Edit Category";
		$this->layout->page_content	= View::make('admin.categories.edit')->with('category', $category);
	}

	public function post_edit()
	{
		$category = Category::find(Input::get('id'));
		$category->name = Input::get('name');
		$category->short_description = Input::get('short_description');
		$category->slug = Str::slug(Input::get('name'), '_');
		$category->save();
		return
			Redirect::to_action('admin.categories@view', array($category->id))
			->with('flash', true)
			->with('flash_type', 'success')
			->with('flash_msg', 'Category updated successfully.');
	}

	public function post_delete()
	{
		$category = Category::find(Input::get('id'));
		$category->delete();
		return
			Redirect::to_action('admin.categories@all')
			->with('flash', true)
			->with('flash_type', 'success')
			->with('flash_msg', 'Category deleted successfully.');
	}

}