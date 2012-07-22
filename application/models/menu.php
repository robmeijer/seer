<?php

class Menu extends Eloquent {

	public static $timestamps = true;

	public function links()
	{
		return $this->has_many_and_belongs_to('Link');
	}
	
}