<?php
	require_once('Address.php');

	/*
	 * User model
	 */
	class User {

		public $id;
		public $password;
		public $firstname;
		public $lastname;
		public $type;
		public $mail;
		public $birthdate;

		public function __construct() {}

		// // get methods
		// public function getId() {
  //       	return $this->id;
	 //    }

	 //    public function getFirstname() {
	 //        return $this->firstname;
	 //    }

	 //    public function getLastname() {
	 //        return $this->lastname;
	 //    }

	 //    public function getType() {
	 //        return $this->type;
	 //    }

		// public function getMail() {
	 //    	return $this->mail;
	 //    }

		// public function getBirthdate() {
	 //    	return $this->birthdate;
	 //    }	 
	       
	    //set methods
	    public function setId($id) {
        	return $this->id = $id;
	    }

	    public function setPassword($password) {
        	return $this->password = $password;
	    }

	    public function setFirstname($firstname) {
	        return $this->firstname = $firstname;
	    }

	    public function setLastname($lastname) {
	        return $this->lastname = $lastname;
	    }

	    public function setType($type) {
	        return $this->type = $type;
	    }

	    public function setMail($mail) {
	    	return $this->mail = $mail;
	    }

	    public function setBirthdate($birthdate) {
	    	return $this->birthdate = $birthdate;
	    }

		public static function userExist($mail) {
			$mysqli = Connection::getConnection();
		 	$query = "SELECT * FROM users WHERE mail = '$mail'";
		 	$result = $mysqli->query($query);
		 	$row_cnt = $result->num_rows;
			Connection::disconnect();
			return $row_cnt;
		}

		public function changePassword($value) {
			$this->setPassword($value);
		}

		public static function getUser($mail, $password)
		{
			$mysqli = Connection::getConnection();

			$sql_query = "SELECT * FROM Users WHERE mail='$mail' AND password='$password'";
			$result = $mysqli->query($sql_query);
			$row = $result->fetch_array(MYSQLI_ASSOC);
			if(!empty($mail) && !empty($password))
			{
				$_SESSION['user'] = $row['mail'];
				$_SESSION['id'] = $row['id'];
				return 1;
			}
			else
			{
				return 0;
			}

			Connection::disconnect();
		}

		public static function getCurrentUser() {
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

		public function getMainAddress() {
			$mysqli = Connection::getConnection();
			$query = "SELECT * FROM address as a INNER JOIN users as u ON a.adresseble_id=u.id WHERE adresseble_id = $this->id AND adresseble_type = '$this->type' AND main='1'";
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

		public function newAddress($address, $city, $phone, $postalcode) {
			if($this->type=="client") {
				$address = Address::newAddress($this->id, $this->type, $address, $city, $phone, $postalcode, '1');
			}
		}

		public function updateAddress($addr, $city, $phone, $postalcode) {
			$address = $this->getMainAddress();
			$address->setAddress($addr);
			$address->setCity($city); 
			$address->setPhone($phone);
			$address->setPostalcode($postalcode);
			$address->save();
		}

		public function save() {
			$mysqli = Connection::getConnection();
			if(empty($this->id)) {
				$query = "INSERT INTO users (password, firstname, lastname, type, mail, birthdate) VALUES ('$this->password', '$this->firstname', '$this->lastname', '$this->type', '$this->mail', '$this->birthdate')";
				$result = $mysqli->query($query);
				$this->id=$mysqli->insert_id;
				return $result;
			}
			else {
				$query = "UPDATE users SET password='$this->password' WHERE id='$this->id'";
				$result = $mysqli->query($query);
				Connection::disconnect();
				return $result;
			}
			Connection::disconnect();
		}
	}