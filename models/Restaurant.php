<?php
	require_once('Address.php');
	/*
	 * Restaurant model
	 */
	class Restaurant {
		private $name;
		private $id;
		private $address;
		private $city;
		private $phone;
		private $postalCode;
		public function __construct($name, $address, $city, $phone, $postalCode) {
			$this->name = $name;
			$this->address = $address;
			$this->city = $city;
			$this->phone = $phone;
			$this->postalCode = $postalCode;
		}

	    public function save() {
	    	$mysqli = Connection::getConnection();

	    	$query = "INSERT INTO restaurants (name) VALUES ('$this->name')";
			$result = $mysqli->query($query);
			$this->id=$mysqli->insert_id;
			Address::newAddress($this->id, 'restaurant', $this->address, $this->city, $this->phone, $this->postalCode, '1');
	    	Connection::disconnect();
	    }

	    public static getAllRestaurants() {
	    	$mysqli = Connection::getConnection();
			$restNameArray = array();
			$query = "SELECT name FROM restaurants";
			$result = $mysqli->query($query);

			if($result){
				while($row = mysqli_fetch_array($result)) {
                    $name = $row["name"];
                    array_push($restNameArray, $name);
                }
			}

	    	Connection::disconnect();
	    	return $restNameArray;
	    }

	    public static function getMainAddress() {
			$mysqli = Connection::getConnection();
			$query = "SELECT * FROM address as a INNER JOIN restaurants as r ON a.adresseble_id=r.id WHERE adresseble_id = $this->id AND adresseble_type = 'restaurant' AND main='1'";
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
	}