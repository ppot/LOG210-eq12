<?php
	/**
	* address model
	*/
	class Address
	{
		public $id;
		public $addressebleId;
		public $addressebleType;
		public $address;
		public $city;		
		public $phone;		
		public $postalcode;
		public $main;

		public function __construct() {}

		// get methods
		public function getId() {
        	return $this->id;
	    }

		public function getAddressebleId() {
        	return $this->addressebleId;
	    }

	    public function getType() {
	        return $this->addressebleType;
	    }

	    public function getAddress() {
	    	return $this->address;
	    }

	    public function getCity() {
	        return $this->city;
	    }

		public function getPhone() {
	    	return $this->phone;
	    }

	    public function getPostalcode() {
	        return $this->postalcode;
	    }

		public function getMain() {
	    	return $this->main;
	    } 
	       
	    //set methods
	    public function setId($id) {
        	return $this->id = $id;
	    }

	    public function setAddressebleId($addressebleId) {
        	return $this->addressebleId = $addressebleId;
	    }

	    public function setType($addressebleType) {
	        return $this->addressebleType = $addressebleType;
	    }

	    public function setAddress($address) {
        	return $this->address = $address;
	    }

	    public function setCity($city) {
	        return $this->city = $city;
	    }

	    public function setPhone($phone) {
	    	return $this->phone = $phone;
	    }

	    public function setPostalcode($postalcode) {
	        return $this->postalcode = $postalcode;
	    }

		public function setMain($main) {
	    	return $this->main = $main;
	    } 


		public static function newAddress($addresseble_id, $addressebleType, $addr, $city, $phone, $postalcode, $main) {
			$address = new Address();
			$address->setAddressebleId($addresseble_id);
			$address->setType($addressebleType);
			$address->setAddress($addr);
			$address->setCity($city); 
			$address->setPhone($phone);
			$address->setPostalcode($postalcode); 
			$address->setMain($main);
			$address->save();
		}

		public function save()
		{
			$mysqli = Connection::getConnection();
			if(empty($this->id)) {
				$query = "INSERT INTO address (adresseble_id,adresseble_type,address,city,phone,postalcode,main) VALUES ('$this->addressebleId','$this->addressebleType','$this->address','$this->city','$this->phone','$this->postalcode','$this->main')";
				$result = $mysqli->query($query);
				return $result;
			}
			else {
				$query = "UPDATE address SET address='$this->address', city='$this->city', phone='$this->phone', postalcode='$this->postalcode' WHERE adresseble_id = $this->addressebleId AND adresseble_type = '$this->addressebleType'";
				$result = $mysqli->query($query);
				return $result;
			}
			Connection::disconnect();
		}
	}