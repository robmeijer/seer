<?php

class Dashboard_Controller extends Base_Controller {

	public $layout = 'layouts.default';
	public $restful = true;

	public function __construct()
	{
		parent::__construct();
	}

	public function get_index()
	{
		$this->layout->page_title = "Dashboard";
		$this->layout->page_content = View::make('dashboard.index');
	}

}
