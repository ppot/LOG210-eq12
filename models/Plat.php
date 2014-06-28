<?php
/**
* Plat
*/
class Plat
{

	public $id;
	public $menu_id;
	public $name;
	public $price;
	public $description;
	
	function __construct() {}

	public function setId($id)
	{
		$this->id = $id;
	}	

	public function setMenuId($menu_id)
	{
		$this->menu_id = $menu_id;
	}	

	public function setName($name)
	{
		$this->name = $name;
	}

	public function setPrice($price)
	{
		$this->price = $price;
	}

	public function setDescription($description)
	{
		$this->description = $description;
	}

	public static function getById($id)
	{
    	$mysqli = Connection::getConnection();
    	//
    	//......
    	//
    	return null;
	}
	public function remove()
	{
    	//
    	//......
    	//
		return $this;
	}

	public function save()
	{
    	$mysqli = Connection::getConnection();
    	if(empty($this->id)) 
		{
	    	//
	    	//......
	    	//
			return $this;
		}
		else 
		{
	    	//
	    	//......
	    	//
			return $this;
		}
		Connection::disconnect();
	}
}

?>