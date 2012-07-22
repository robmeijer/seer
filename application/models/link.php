<?php

class Link extends Eloquent {

	public static $timestamps = true;

	public function menus()
	{
		return $this->has_many_and_belongs_to('Menu');
	}
	
}