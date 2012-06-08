<?php

class Admin_Items_Controller extends Base_Controller {
	
	public $layout = 'layouts.default';
	public $restful = true;
	
	public function __construct()
	{
		parent::__construct();
		$this->filter('before', 'auth');
	}

	public function get_index()
	{
		return Redirect::to('admin/items/all');
	}

	public function get_all()
	{

		$items = Item::paginate(1);

		$this->layout->page_title		= "Admin - All items";
		$this->layout->page_content	= View::make('admin.items.all')->with('items', $items);
	}

	public function get_view($id)
	{
		$item = Item::find($id);

		$this->layout->page_title		= "Admin - Item - " . $item->name;
		$this->layout->page_content	= View::make('admin.items.view')->with('item', $item);
	}

}