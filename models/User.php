<?php
	require_once('Address.php');
	/**
	* User model
	*/
	class User
	{
		public $id;
		public $username;
		public $password;
		public $firstname;
		public $lastname;
		public $type;
		public $mail;
		public $birthdate;

		// get methods
		public function getId() 
		{
        	return $this->id;
	    }
		public function getUsername() 
		{
        	return $this->username;
	    }
	    public function getFirstname() 
	    {
	        return $this->firstname;
	    }
	    public function getLastname() 
	    {
	        return $this->lastname;
	    }
	    public function getType() 
	    {
	        return $this->type;
	    }
		public function getMail() 
		{
	    	return $this->mail;
	    }
		public function getBirthdate() 
		{
	    	return $this->birthdate;
	    }	 
	       
	    //set methods
	    public function setId($id) 
	    {
        	return $this->id = $id;
	    }
	    public function setUsername($username) 
	    {
        	return $this->username = $username;
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

	    //functions
	    public function __construct()
		{

		}

		// public function __construct($id,$username, $password, $firstname, $lastname, $type, $mail, $birthdate)
		// {
		// 	$this->setId($id); 
		// 	$this->setUsername($username);
		// 	$this->setPassword($password);
		// 	$this->setFirstname($firstname);
		// 	$this->setLastname($lastname);
		// 	$this->setType($type); 
		// 	$this->setMail($mail);
		// 	$this->setBirthdate($birthdate); 
		// }

		public static function userExist($username)
		{
			$mysqli = new mysqli("localhost", "root", "root", "LOG210");
		 	$query = "SELECT * FROM users WHERE username = '$username'";
		 	$result = $mysqli->query($query);
		 	$row_cnt = $result->num_rows;
			$mysqli->close();
			return $row_cnt;
		}

		public function changePassword($value)
		{
			$this->setPassword($value);
		}

		public static function getCurrentUser()
		{
			$id = $_SESSION['id'];
			$mysqli = new mysqli("localhost", "root", "root", "LOG210");
			$query = "SELECT * FROM users WHERE id='$id'";
			$result = $mysqli->query($query);
			$row = $result->fetch_assoc();
			$user = new User();
			$user->setId($row['id']); 
			$user->setUsername($row['username']);
			$user->setPassword($row['password']);
			$user->setFirstname($row['firstname']);
			$user->setLastname($row['lastname']);
			$user->setType($row['type']); 
			$user->setMail($row['mail']);
			$user->setBirthdate($row['birthdate']); 
			$mysqli->close();
			return $user;
		}

		public function getMainAddress()
		{
			$mysqli = new mysqli("localhost", "root", "root", "LOG210");
			$query = "SELECT * FROM address as a INNER JOIN users as u ON a.adresseble_id=u.id WHERE adresseble_id = $this->id AND adresseble_type = '$this->type' AND main='1'";
			$result = $mysqli->query($query);
			$row = $result->fetch_assoc();
			$address = new Address();
			$address->setId($row['id']); 
			$address->setAddressebleId($row['adresseble_id']);
			$address->setType($row['adresseble_type']);
			$address->setNoMaison($row['no_maison']);
			$address->setStreet($row['street']);
			$address->setCity($row['city']); 
			$address->setPhone($row['phone']);
			$address->setPostalcode($row['postalcode']); 
			$address->setMain($row['main']);
			$mysqli->close();
			return $address;
		}

		public function newAddress($no_maison,$street,$city,$phone,$postalcode)
		{
			if($this->type=="client")
			{
				$address = Address::newAddress($this->id,$this->type,$no_maison,$street,$city,$phone,$postalcode,'1');
			}
		}

		public function updateAddress($no_maison,$street,$city,$phone,$postalcode)
		{
			$address = $this->getMainAddress();
			$address->setNoMaison($no_maison);
			$address->setStreet($street);
			$address->setCity($city); 
			$address->setPhone($phone);
			$address->setPostalcode($postalcode);
			$address->save();
		}

		public function save()
		{
			$mysqli = new mysqli("localhost", "root", "root", "LOG210");
			if(empty($this->id))
			{
				$query = "INSERT INTO users (username, password, firstname, lastname, type, mail, birthdate) VALUES ('$this->username','$this->password','$this->firstname','$this->lastname','$this->type','$this->mail','$this->birthdate')";
				$result = $mysqli->query($query);
				$this->id=$mysqli->insert_id;
				return $result;
			}
			else
			{
				$query = "UPDATE users SET password='$this->password' WHERE id='$this->id'";
				$result = $mysqli->query($query);
				$mysqli->close();
				return $result;
			}
			$mysqli->close();
		}
	}