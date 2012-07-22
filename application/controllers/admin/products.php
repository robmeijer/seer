<?php

class Admin_Products_Controller extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->filter('before', 'role:9')->only(array('delete'));
	}

	public function get_index()
	{
		return Redirect::to_action('admin.products@all');
	}

	public function get_view($id)
	{
		$product = Product::find($id);
		$this->layout->page_title   = "Admin - Products - View";
		$this->layout->page_content = View::make('admin.products.view')->with('product', $product);
	}

	public function get_add($category_id)
	{
		$this->layout->page_title   = "Admin - Add Product";
		$this->layout->page_content = View::make('admin.products.add')
			->with('category_id', $category_id);
	}

	public function post_add()
	{
		$product = new Product;
		$product->name = Input::get('name');
		$product->short_description = Input::get('short_description');
		$product->slug = Str::slug(Input::get('name'), '_');

		$category = Category::find(Input::get('category_id'));
		$category->products()->insert($product);

		return
			Redirect::to_action('admin.categories@list', array($category->id))
			->with('flash', true)
			->with('flash_type', 'success')
			->with('flash_msg', 'New product created successfully.');
	}

	public function get_edit($id)
	{
		$product = Product::find($id);
		$this->layout->page_title   = "Admin - Edit Product";
		$this->layout->page_content = View::make('admin.products.edit')->with('product', $product);
	}

	public function post_edit()
	{
		$product = Product::find(Input::get('id'));
		$product->name = Input::get('name');
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