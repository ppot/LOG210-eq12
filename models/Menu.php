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
    	$query = "SELECT * FROM menus WHERE id='$id'";
		$result = $mysqli->query($query);
		$row = $result->fetch_assoc();
		$menu = new Menu();
			$menu->setId($row['id']); 
			$menu->setRestaurantId($row['restaurant_id']);
			$menu->setName($row['name']);
    	Connection::disconnect();
    	return $menu;

    }

    public static function getForRestaurantId($id)
    {
    	$mysqli = Connection::getConnection();
		$menuArray = array();
    	$query = "SELECT * FROM menus WHERE restaurant_id='$id'";
		$result = $mysqli->query($query);
		while ($row = $result->fetch_assoc()) 
		{
			$menu = new Menu();
			$menu->setId($row['id']); 
			$menu->setRestaurantId($row['restaurant_id']);
			$menu->setName($row['name']);

			array_push($menuArray,$menu);
		}
    	Connection::disconnect();
    	return $menuArray;	
    }

    public function getPlats() 
    {
    	$mysqli = Connection::getConnection();
		$platsArray = array();
		$query = "SELECT * FROM plats WHERE menu_id='$this->id'";
		$result = $mysqli->query($query);
		while ($row = $result->fetch_assoc()) 
		{
	    	$plat = new Plat();
			$plat->setId($row['id']); 
			$plat->setMenuId($row['menu_id']);
			$plat->setName($row['name']);
			$plat->setPrice($row['price']);
			$plat->setDescription($row['description']);

			array_push($platsArray,$plat);
		}
    	Connection::disconnect();
    	return $platsArray;
    }

	public function addPlat($name,$price,$description)
	{
		$plat = new Plat();
		$plat->setMenuId($this->id);
		$plat->setName($name);
		$plat->setPrice($price);	
		$plat->setDescription($description);
		return $plat->save();
	}

	public function save()
	{
    	$mysqli = Connection::getConnection();
    	if(empty($this->id)) 
		{
	    	$query = "INSERT INTO menus (restaurant_id,name) VALUES ('$this->restaurant_id','$this->name')";
			$result = $mysqli->query($query);
			$this->id=$mysqli->insert_id;
			return $this;
		}
		else 
		{
			$query = "UPDATE menus SET name='$this->name' WHERE id='$this->id'";
			$result = $mysqli->query($query);
			return $result;
		}
		Connection::disconnect();
	}


}

?>