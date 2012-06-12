<?php

class Seed_Task extends Task
{
	public function run()
	{
		for ($i=4001; $i<=40000; $i++)
		{
			$item = new Item;
				$item_name = Str::random(5, 'alpha') . ' ' . Str::random(5, 'alpha') . ' ' . Str::random(5, 'alpha') . ' ' . Str::random(5, 'alpha');
				$item->name = $item_name;
				$item->slug = Str::slug($item_name);
				$item->code = $i;
				$item->price = 99.9999;
				$item->rrp = 99.9999;
				$item->status = 1;
				$item->votes = 0;
				$item->points = 0;
				$item->taxfree = 0;
				$item->click_counter = 0;
				$item->save();
		}
	}
}