<?php
     
class Breadcrumbs {

	public static function get($id)
	{
		$breadcrumbs = array();
		if ($id)
		{
			$id = Category::find($id)->parent;
			while ($id)
			{
				$breadcrumbs[] = array('id' => $id, 'name' => Category::find($id)->name);
				$id = Category::find($id)->parent;
			}
		}

		return array_reverse($breadcrumbs);
	}

}