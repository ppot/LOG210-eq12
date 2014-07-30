<?php
	require_once('Address.php');

	/*
	 * User model
	 */
	class User 
	{

		public $id;
		private $password;
		public $firstname;
		public $lastname;
		public $type;
		public $mail;
		public $birthdate;

		public function __construct() {}
	       
	    //set methods
	    public function setId($id) 
	    {
        	return $this->id = $id;
	    }

	    public function setPassword($password) 
	    {
        	return $this->password = $password;
	    }

	    public function setFirstname($firstname) 
	    {
	        return $this->firstname = $firstname;
	    }

	    public function setLastname($lastname) 
	    {
	        return $this->lastname = $lastname;
	    }

	    public function setType($type) 
	    {
	        return $this->type = $type;
	    }

	    public function setMail($mail) 
	    {
	    	return $this->mail = $mail;
	    }

	    public function setBirthdate($birthdate) 
	    {
	    	return $this->birthdate = $birthdate;
	    }

		public static function userExist($mail) 
		{
			$mysqli = Connection::getConnection();
		 	$query = "SELECT * FROM users WHERE mail = '$mail'";
		 	$result = $mysqli->query($query);
		 	$row_cnt = $result->num_rows;
			Connection::disconnect();
			return $row_cnt;
		}

		public function changePassword($value) 
		{
			$this->setPassword($value);
		}

		public static function getUser($mail, $password)
		{
			$mysqli = Connection::getConnection();

			$sql_query = "SELECT * FROM Users WHERE mail='$mail' AND password='$password'";
			$result = $mysqli->query($sql_query);
			$row = $result->fetch_assoc();
			if(!empty($mail) && !empty($password))
			{
				$_SESSION['user'] = $row['mail'];
				$_SESSION['type'] = $row['type'];
				$_SESSION['id'] = $row['id'];

				$user = new User();
				$user->setId($row['id']); 
				$user->setPassword($row['password']);
				$user->setFirstname($row['firstname']);
				$user->setLastname($row['lastname']);
				$user->setType($row['type']); 
				$user->setMail($row['mail']);
				$user->setBirthdate($row['birthdate']);
				return $user;
			}
			else
			{
				return null;
			}

			Connection::disconnect();
		}

		public static function getUserById($id)
		{
			$mysqli = Connection::getConnection();

			$sql_query = "SELECT * FROM Users WHERE id='$id'";
			$result = $mysqli->query($sql_query);
			$row = $result->fetch_assoc();
			$user = new User();
			$user->setId($row['id']); 
			$user->setPassword($row['password']);
			$user->setFirstname($row['firstname']);
			$user->setLastname($row['lastname']);
			$user->setType($row['type']); 
			$user->setMail($row['mail']);
			$user->setBirthdate($row['birthdate']); 
			Connection::disconnect();
			return $user;


		}

		public static function getUsers($type)
		{
			$usersArray= array();
			$mysqli = Connection::getConnection();
			$sql_query = "SELECT * FROM Users WHERE type='$type'";
			$result = $mysqli->query($sql_query);
		    while ($row = $result->fetch_assoc()) 
		    {
		    	$user = new User();
				$user->setId($row['id']); 
				$user->setPassword($row['password']);
				$user->setFirstname($row['firstname']);
				$user->setLastname($row['lastname']);
				$user->setType($row['type']); 
				$user->setMail($row['mail']);
				$user->setBirthdate($row['birthdate']); 
		    	array_push($usersArray,$user);
			}

			Connection::disconnect();
			return $usersArray;
		}

	    public static function getRestaurateursNotInRestaurants()
	    {
	    	$mysqli = Connection::getConnection();
			$restaurateurArray = array();
	    	$query = "SELECT * FROM users WHERE id NOT IN (SELECT restaurateur_Id FROM restaurants) AND type='restaurateur'";
			$result = $mysqli->query($query);
			while ($row = $result->fetch_assoc()) 
			{
		    	$user = new User();
				$user->setId($row['id']); 
				$user->setPassword($row['password']);
				$user->setFirstname($row['firstname']);
				$user->setLastname($row['lastname']);
				$user->setType($row['type']); 
				$user->setMail($row['mail']);
				$user->setBirthdate($row['birthdate']); 

				array_push($restaurateurArray,$user);
			}
	    	Connection::disconnect();
	    	return $restaurateurArray;	    	
	    }

		public static function getCurrentUser()
		{
			$id = $_SESSION['id'];
			$mysqli = Connection::getConnection();
			$query = "SELECT * FROM users WHERE id='$id'";
			$result = $mysqli->query($query);
			$row = $result->fetch_assoc();
			$user = new User();
			$user->setId($row['id']); 
			$user->setPassword($row['password']);
			$user->setFirstname($row['firstname']);
			$user->setLastname($row['lastname']);
			$user->setType($row['type']); 
			$user->setMail($row['mail']);
			$user->setBirthdate($row['birthdate']); 
			Connection::disconnect();
			return $user;
		}

		public function getMainAddress() 
		{
			$mysqli = Connection::getConnection();
			$query = "SELECT * FROM address WHERE adresseble_id = '$this->id' AND adresseble_type = '$this->type' AND main='1'";
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
			$address->setDelivery($row['delivery']);
			Connection::disconnect();
			return $address;
		}

		public function getDeliveryAddress() 
		{
			$mysqli = Connection::getConnection();
			$query = "SELECT * FROM address WHERE adresseble_id = '$this->id' AND adresseble_type = '$this->type' AND delivery='1'";
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
			$address->setDelivery($row['delivery']);
			Connection::disconnect();
			return $address;
		}

		public function newAddress($address, $city, $phone, $postalcode)
		{
			if($this->type=="client") 
			{
				Address::newAddress($this->id, $this->type, $address, $city, $phone, $postalcode, '1','0');
			}
		}

		public function updateAddress($addr, $city, $phone, $postalcode) 
		{
			$address = $this->getMainAddress();
			$address->setAddress($addr);
			$address->setCity($city); 
			$address->setPhone($phone);
			$address->setPostalcode($postalcode);
			$address->save();
		}

		public function newDeliveryAddress($address,$city,$phone,$postalcode)
		{
			if($this->type=="client") 
			{
				Address::newAddress($this->id, $this->type, $address, $city, $phone, $postalcode, '0','1');
			}			
		}

		public function changeDelivery($id)
		{
			$address = Address::getAddressById($id);
			$address->setDelivery('1');
			$address->save();
			return $address;
		}

		public function getAddress()
		{
	    	$mysqli = Connection::getConnection();
			$addressArray = array();
			$query = "SELECT * FROM address WHERE adresseble_id = '$this->id' AND adresseble_type = '$this->type'";
			
			$result = $mysqli->query($query);
			while ($row = $result->fetch_assoc()) 
			{
				$address = new Address();
				$address->setId($row['id']); 
				$address->setAddressebleId($row['adresseble_id']);
				$address->setType($row['adresseble_type']);
				$address->setAddress($row['address']);
				$address->setCity($row['city']); 
				$address->setPhone($row['phone']);
				$address->setPostalcode($row['postalcode']); 
				$address->setMain($row['main']);
				$address->setDelivery($row['delivery']);

				array_push($addressArray,$address);
			}
	    	Connection::disconnect();
	    	return $addressArray;			
		}

		public static function delete($id)
		{
			$mysqli = Connection::getConnection();
			$query = "DELETE FROM users WHERE id='$id'";
			$result = $mysqli->query($query);
			Connection::disconnect();		
			return 1;
		}

		public function save() 
		{
			$mysqli = Connection::getConnection();
			if(empty($this->id)) 
			{
				$query = "INSERT INTO users (password, firstname, lastname, type, mail, birthdate) VALUES ('$this->password', '$this->firstname', '$this->lastname', '$this->type', '$this->mail', '$this->birthdate')";
				$result = $mysqli->query($query);
				$this->id=$mysqli->insert_id;
				return $this;
			}
			else 
			{
				$query = "UPDATE users SET password='$this->password' WHERE id='$this->id'";
				$result = $mysqli->query($query);
				return $this;
			}
			Connection::disconnect();
		}
	}