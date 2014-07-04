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

    	$query = "SELECT * FROM menus WHERE id = '$id'";
    	$result = $mysqli->query($query);
    	$row = $result->fetch_array(MYSQLI_ASSOC);

    	$menu = new Menu();

    	$menu->setId($row['id']);
    	$menu->setRestaurantId($row['restaurant_id']);
    	$menu->setName($row['name']);

    	Connection::disconnect();

    	return $menu;
    }

    public function getPlats() 
    {
    	$mysqli = Connection::getConnection();
		$platsArray = array();
		$query = "SELECT * FROM plats WHERE menu_id = '$this->id'";
		$restult = $mysqli->query($query);
		while($row = $result->fetch_assoc())
		{
			$plat = new Plat();
			$plat->setId($row['id']);
			$plat->setMenuId($row['menu_id']);
			$plat->setName($row['name']);
			$plat->setPrice($row['price']);
			$plat->setDescription($row['description']);

			array_push($platsArray, $plat);
		}
    	Connection::disconnect();
    	return $platsArray;
    }

	public function addPlat($name,$price,$description)
	{
    	$mysqli = Connection::getConnection();
    	$query = "INSERT INTO plats (description, name, price, menu_id) VALUES ('$description', '$name', '$price' '$this->id')";
    	$result = $mysqli->query($query);
	    Connection::disconnect();
		return $result;
	}

	public function save()
	{
    	$mysqli = Connection::getConnection();
    	if(empty($this->id)) 
		{
			$query = "INSERT INTO menus (name, restaurant_id) VALUES ('$this->name', '$this->restaurant_id')";
			$result = $mysqli->query($query);
			$this->id=$mysqli->insert_id;
			return $result;
		}
		else 
		{
	    	$query = "UPDATE menus SET menu_id = '$this->menu_id', name = '$this->name' WHERE id = '$this->id'";
	    	$result = $mysqli->query($query);
	    	return $result;
		}
		Connection::disconnect();
	}
}