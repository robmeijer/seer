<?php

class Frontend_Categories_Controller extends Frontend_Controller {

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

}