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
<<<<<<< HEAD
		$restaurantArray = array();
		$query = "SELECT * FROM plats WHERE id='$id'";
		$result = $mysqli->query($query);
		$row = $result->fetch_assoc();
	    	$plat = new Plat();
			$plat->setId($row['id']); 
			$plat->setMenuId($row['menu_id']);
			$plat->setName($row['name']);
			$plat->setPrice($row['price']);
			$plat->setDescription($row['description']);
    	Connection::disconnect();
    	return $plat;
	}
	public function remove()
	{
    	$mysqli = Connection::getConnection();
    	$query = "DELETE FROM plats WHERE id='$this->id'";
		$result = $mysqli->query($query);
		Connection::disconnect();
=======
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
>>>>>>> ADD CU1/CU8 + CU5 to complete
		return $this;
	}

	public function save()
	{
    	$mysqli = Connection::getConnection();
    	if(empty($this->id)) 
		{
<<<<<<< HEAD
	    	$query = "INSERT INTO plats (menu_id,name,price,description) VALUES ('$this->menu_id','$this->name','$this->price','$this->description')";
			$result = $mysqli->query($query);
			$this->id=$mysqli->insert_id;
=======
	    	//
	    	//......
	    	//
>>>>>>> ADD CU1/CU8 + CU5 to complete
			return $this;
		}
		else 
		{
<<<<<<< HEAD
			$query = "UPDATE plats SET name='$this->name',price='$this->price',description='$this->description' WHERE id='$this->id'";
			$result = $mysqli->query($query);
=======
	    	//
	    	//......
	    	//
>>>>>>> ADD CU1/CU8 + CU5 to complete
			return $this;
		}
		Connection::disconnect();
	}
}

?>