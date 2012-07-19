<?php

class Admin_Dashboard_Controller extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function get_index()
	{
		$this->layout->page_title = "Dashboard";
		$this->layout->page_content = View::make('admin.dashboard.index');
	}

}
