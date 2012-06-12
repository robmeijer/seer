<?php

class Admin_Controller extends Controller {

	public $layout = 'layouts.admin';
	public $restful = true;

	public function __construct()
	{
		parent::__construct();
		$this->filter('before', 'auth');
	}

	/**
	 * Catch-all method for requests that can't be matched.
	 *
	 * @param  string    $method
	 * @param  array     $parameters
	 * @return Response
	 */
	public function __call($method, $parameters)
	{
		return Response::error('404');
	}

}