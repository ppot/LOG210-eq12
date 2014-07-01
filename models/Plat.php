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
    	$query = "SELECT * FROM plats WHERE id = '$id'";
    	$result = $mysqli->query($query);
    	$row = $result->fetch_array(MYSQLI_ASSOC);

    	$plat = new Plat();
    	$plat->setId($row['id']);
    	$plat->setDescription($row['description']);
    	$plat->setName($row['name']);
    	$plat->setPrice($row['price']);
    	$plat->setMenuId($row['menu_id']);

    	Connection::disconnect();
    	return $plat;
	}
	public function remove()
	{
    	$mysqli = Connection::getConnection();
    	$query = "DELETE FROM plats WHERE id='$this->id'";
    	$result = $mysqli->query($query);
	    Connection::disconnect();
		return $this;
	}

	public function save()
	{
    	$mysqli = Connection::getConnection();
    	if(empty($this->id)) 
		{
	    	$query = "INSERT INTO plats (description, name, price, menu_id) VALUES ('$this->description', '$this->name', '$this->price', '$this->menu_id')";
			$result = $mysqli->query($query);
			$this->id=$mysqli->insert_id;
			return $result;
		}
		else 
		{
			$query = "UPDATE plats SET description = '$this->description', name = '$this->name', price = '$this->price', menu_id = '$this->menu_id' WHERE id = '$this->id'";
			$result = $mysqli->query($query);
			return $result;
		}
		Connection::disconnect();
	}
}

?>