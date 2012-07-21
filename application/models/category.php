<?php

class Category extends Eloquent {

	public static $timestamps = true;

	public function children()
	{
		return $this->has_many('Category', 'parent');
	}
	
}