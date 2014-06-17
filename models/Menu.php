<?php
	require_once('Plat.php');
/**
* Menu
*/
class Menu
{
	public $id;
	public $restaurant_id;
	public $name;

	function __construct() {}

	public function setId($id)
	{
		$this->id = $id;
	}	

	public function setRestaurantId($restaurantId)
	{
		$this->restaurant_id = $restaurantId;
	}	

	public function setName($name)
	{
		$this->name = $name;
	}

	public static function getMenu($id)
	{
    	$mysqli = Connection::getConnection();
    	//
    	//......
    	//
    	return $menu;

    }

    public function getPlats() 
    {
    	$mysqli = Connection::getConnection();
		$platsArray = array();
    	//
    	//......
    	//
    	Connection::disconnect();
    	return $platsArray;
    }

	public function addPlat($name,$price,$description)
	{
    	//
    	//......
    	//
		return null;
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
			return $result;
		}
		Connection::disconnect();
	}


}

?>