<?php

class Category extends Eloquent {

	public static $timestamps = true;

	public function children()
	{
		return $this->has_many('Category', 'parent');
	}
	
	public function products()
	{
		return $this->has_many_and_belongs_to('Product');
	}
	
}