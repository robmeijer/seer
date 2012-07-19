<?php

class Frontend_Home_Controller extends Frontend_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function get_index()
	{
		$this->layout->page_title		= "Frontend - Home - Index";
		$this->layout->page_content	= View::make('frontend.home.index');
	}

}