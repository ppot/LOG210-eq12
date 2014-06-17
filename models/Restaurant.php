<?php
	require_once('Address.php');
	require_once('Menu.php');
	/*
	 * Restaurant model
	 */
	class Restaurant 
	{
		public $id;
		public $restaurateur_id;
		public $name;
		public $address;

		public function __construct() {}

		public function setId($id) 
	    {
        	return $this->id = $id;
	    }

		public function setRestaurateurId($restaurateur_id) 
	    {
        	return $this->restaurateur_id = $restaurateur_id;
	    }

	   	public function setName($name) 
	    {
        	return $this->name = $name;
	    }

	   	public function setAddress($address) 
	    {
        	return $this->address = $address;
	    }

	  	public function newAddress($address, $city, $phone, $postalcode) 
	  	{
<<<<<<< HEAD
			Address::newAddress($this->id, 'restaurant',$address, $city, $phone, $postalcode, '1','0');
=======
			Address::newAddress($this->id, 'restaurant',$address, $city, $phone, $postalcode, '1');
>>>>>>> ADD CU1/CU8 + CU5 to complete
		}

		public function changeAddress($address, $city, $phone, $postalcode)
		{
			$this->address->setAddress($address);			
			$this->address->setCity($city);
			$this->address->setPostalcode($postalcode);
			$this->address->setPhone($phone);
			$this->address->save();			
		}

		public static function getRestaurantById($id)
		{
			$mysqli = Connection::getConnection();

			$sql_query = "SELECT * FROM restaurants WHERE id='$id'";
			$result = $mysqli->query($sql_query);
<<<<<<< HEAD
			$row = $result->fetch_assoc();
=======
			$row = $result->fetch_array(MYSQLI_ASSOC);
>>>>>>> ADD CU1/CU8 + CU5 to complete

			$restaurant = new Restaurant();

			// if($row != null)
			// {
				$restaurant->setId($row['id']); 
				$restaurant->setRestaurateurId($row['restaurateur_id']);
				$restaurant->setName($row['name']);
				$restaurant->setAddress($restaurant->getMainAddress());
			// }
			Connection::disconnect();
			return $restaurant;
		}

		public static function getRestaurantsForRestaurateurId($id)
		{
	    	$mysqli = Connection::getConnection();
			$restaurantArray = array();
			$query = "SELECT * FROM restaurants WHERE restaurateur_id='$id'";
			$result = $mysqli->query($query);
			$row = $result->fetch_assoc();

			$restaurantId = -1;
			if($row == true)
			{	
				$restaurantId = $row['id'];
			}	
	    	Connection::disconnect();
	    	return $restaurantId;
		}

		public static function getRestaurantRestaurateurId($id)
		{
	    	$mysqli = Connection::getConnection();
<<<<<<< HEAD
=======
			$restaurantArray = array();
>>>>>>> ADD CU1/CU8 + CU5 to complete
			$query = "SELECT * FROM restaurants WHERE restaurateur_id='$id'";
			$result = $mysqli->query($query);
			$row = $result->fetch_assoc();
			$restaurant = new Restaurant();
				$restaurant->setId($row['id']); 
				$restaurant->setRestaurateurId($row['restaurateur_id']);
				$restaurant->setName($row['name']);
	    	Connection::disconnect();
	    	return $restaurant;
		}


	    public static function getRestaurants() 
	    {
	    	$mysqli = Connection::getConnection();
			$restaurantArray = array();
			$query = "SELECT * FROM restaurants";
			$result = $mysqli->query($query);
			while ($row = $result->fetch_assoc()) 
			{
		    	$restaurant = new Restaurant();
				$restaurant->setId($row['id']); 
				$restaurant->setRestaurateurId($row['restaurateur_id']);
				$restaurant->setName($row['name']);
				$restaurant->setAddress($restaurant->getMainAddress());

				array_push($restaurantArray,$restaurant);
			}
	    	Connection::disconnect();
	    	return $restaurantArray;
	    }

	    public static function getRestaurantsNoRestaurateur()
	    {
	    	$mysqli = Connection::getConnection();
			$restaurantArray = array();
			$query = "SELECT * FROM restaurants WHERE restaurateur_id=-1";
			$result = $mysqli->query($query);
			while ($row = $result->fetch_assoc()) 
			{
		    	$restaurant = new Restaurant();
				$restaurant->setId($row['id']); 
				$restaurant->setRestaurateurId($row['restaurateur_id']);
				$restaurant->setName($row['name']);
				$restaurant->setAddress($restaurant->getMainAddress());

				array_push($restaurantArray,$restaurant);
			}
	    	Connection::disconnect();
	    	return $restaurantArray;	    	
	    }

	    public function getMainAddress() 
	    {
			$mysqli = Connection::getConnection();
			$query = "SELECT * FROM address WHERE adresseble_id = $this->id AND adresseble_type = 'restaurant' AND main='1'";
			$result = $mysqli->query($query);
			$row = $result->fetch_assoc();
			$address = new Address();
			$address->setId($row['id']); 
			$address->setAddressebleId($row['adresseble_id']);
			$address->setType($row['adresseble_type']);
			$address->setAddress($row['address']);
			$address->setCity($row['city']); 
			$address->setPhone($row['phone']);
			$address->setPostalcode($row['postalcode']); 
			$address->setMain($row['main']);
			Connection::disconnect();
			return $address;
		}

		public static function delete($id)
		{
			$mysqli = Connection::getConnection();
			$query = "DELETE FROM restaurants WHERE id='$id'";
			$result = $mysqli->query($query);
			Connection::disconnect();
			return 1;
		}

<<<<<<< HEAD
		public function getMenus()
		{
			$mysqli = Connection::getConnection();
			$menusArray = array();
			$query = "SELECT * FROM menus WHERE restaurant_id='$this->id'";
			$result = $mysqli->query($query);
			while ($row = $result->fetch_assoc()) 
			{
		    	$menu = new Menu();
				$menu->setId($row['id']); 
				$menu->setRestaurantId($row['restaurant_id']);
				$menu->setName($row['name']);

				array_push($menusArray,$menu);
			}
	    	Connection::disconnect();
	    	return $menusArray;	
		}

		public function addMenu($name)
		{
			$menu = new Menu();
			$menu->setRestaurantId($this->id);
			$menu->setName($name);
			return $menu->save();
=======
		public static function getMenus()
		{
			$mysqli = Connection::getConnection();
			$menusArray = array();
	    	//
	    	//......
	    	//
	    	Connection::disconnect();
	    	return $restaurantArray;	
		}

		public static function addMenu($name)
		{
	    	//
	    	//......
	    	//
			return null;
>>>>>>> ADD CU1/CU8 + CU5 to complete
		}

	    public function save() 
	    {
	    	$mysqli = Connection::getConnection();
	    	if(empty($this->id)) 
			{
		    	$query = "INSERT INTO restaurants (restaurateur_id,name) VALUES ('$this->restaurateur_id','$this->name')";
				$result = $mysqli->query($query);
				$this->id=$mysqli->insert_id;
<<<<<<< HEAD
				return $this;
=======
				return $result;
>>>>>>> ADD CU1/CU8 + CU5 to complete
			}
			else 
			{
				$query = "UPDATE restaurants SET restaurateur_id='$this->restaurateur_id', name='$this->name' WHERE id='$this->id'";
				$result = $mysqli->query($query);
<<<<<<< HEAD
				return $this;
=======
				return $result;
>>>>>>> ADD CU1/CU8 + CU5 to complete
			}
			Connection::disconnect();
	    }
	}