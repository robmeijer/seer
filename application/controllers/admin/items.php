<?php

class Admin_Items_Controller extends Admin_Controller {
	
	public function __construct()
	{
		parent::__construct();
	}

	public function get_index()
	{
		return Redirect::to_action('admin.items@all');
	}

	public function get_all()
	{
		$count = Cache::remember('items_count', function() {
			return Item::count();
		}, 30);
		$page = Input::get('page', 1);
		$num_pages = 10;
		$per_page = 20;
		$extra_pages = 4;
		$start_total = $num_pages * $per_page > $count ? $count : $num_pages * $per_page;
		$total = $page * $per_page < $start_total - $per_page * $extra_pages ? $start_total : (($page + $extra_pages) * $per_page > $count ? $count : ($page + $extra_pages) * $per_page);
		
		$items_cache = 'items_'.$page.'_'.$per_page;
		$items = Cache::remember($items_cache, function() use ($page, $per_page) {
			return Item::take($per_page)->skip(($page - 1) * $per_page)->get();
		}, 30);

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