<?php

class Frontend_Categories_Controller extends Base_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function get_index()
	{
		return Redirect::home();
	}

	public function get_view($slug)
	{
		$category = Category::where('slug', '=', $slug)->first();
		$this->layout->page_title		= "Frontend - Categories - View";
		$this->layout->page_content	= View::make('frontend.categories.view')->with('category', $category);
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
		$category = new Category;
		$category->name = Input::get('name');
		$category->description = Input::get('description');
		$category->slug = Str::slug(Input::get('name'), '_');
		$category->save();
		return
			Redirect::to('admin/categories/all')
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
		$category->description = Input::get('description');
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