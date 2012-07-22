<?php

class Product extends Eloquent {

	public static $timestamps = true;

	public function categories()
	{
		return $this->has_many_and_belongs_to('Category');
	}

}