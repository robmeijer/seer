<?php

class Admin_Items_Controller extends Admin_Controller {
	
	public function __construct()
	{
		parent::__construct();
	}

	public function get_index()
	{
		return Redirect::to('admin/items/all');
	}

	public function get_all()
	{
		$page = Input::get('page', 1);
		$per_page = 20;
		$total = 200;
		$extra = 4;
		$total = $page * $per_page <= $total - $per_page * $extra ? $total : ($page + $extra) * $per_page;
		$cache = 'items_'.$page.'_'.$per_page;
		if (Cache::has($cache))
		{
			$items = Cache::get($cache);
		}
		else
		{
			$items = Item::take($per_page)->skip(($page-1)*$per_page)->get();
			Cache::put($cache, $items, 60);
		}
		$items = Paginator::make($items, $total, $per_page);
		$this->layout->page_title = "Admin - All items";
		$this->layout->page_content =
			View::make('admin.items.all')
			->with('items', $items)
			->with('page', $page);
	}

	public function get_view($id)
	{
		$item = Item::find($id);

		$this->layout->page_title		= "Admin - Item - " . $item->name;
		$this->layout->page_content	= View::make('admin.items.view')->with('item', $item);
	}

}