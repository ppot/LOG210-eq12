<?php
	/**
	* address model
	*/
	class Address
	{
		public $id;
		public $addressebleId;
		public $addressebleType;
		public $no_maison;
		public $street;
		public $city;		
		public $phone;		
		public $postalcode;
		public $main;


		// get methods
		public function getId() 
		{
        	return $this->id;
	    }
		public function getAddressebleId() 
		{
        	return $this->addressebleId;
	    }

	    public function getType() 
	    {
	        return $this->addressebleType;
	    }
	    public function getNoMaison() 
	    {
	        return $this->no_maison;
	    }
		public function getStreet() 
		{
	    	return $this->street;
	    }
	    public function getCity() 
	    {
	        return $this->city;
	    }

		public function getPhone() 
		{
	    	return $this->phone;
	    }	
	    public function getPostalcode() 
	    {
	        return $this->postalcode;
	    }

		public function getMain() 
		{
	    	return $this->main;
	    } 
	       
	    //set methods
	    public function setId($id) 
	    {
        	return $this->id = $id;
	    }
	    public function setAddressebleId($addressebleId) 
	    {
        	return $this->addressebleId = $addressebleId;
	    }
	    public function setType($addressebleType) 
	    {
	        return $this->addressebleType = $addressebleType;
	    }
	    public function setNoMaison($no_maison) 
	    {
        	return $this->no_maison = $no_maison;
	    }
	    public function setStreet($street) 
	    {
	        return $this->street = $street;
	    }
	    public function setCity($city) 
	    {
	        return $this->city = $city;
	    }

	    public function setPhone($phone) 
	    {
	    	return $this->phone = $phone;
	    }
	    public function setPostalcode($postalcode) 
	    {
	        return $this->postalcode = $postalcode;
	    }

		public function setMain($main) 
		{
	    	return $this->main = $main;
	    } 
	   	public function __construct()
		{

		}

		// function __construct($id,$addresseble_id,$type,$no_maison,$street,$city,$phone,$postalcode,$main)
		// {
		// 	$this->setId($id); 
		// 	$this->setAddressebleId($addresseble_id);
		// 	$this->setType($type);
		// 	$this->setNoMaison($no_maison);
		// 	$this->setStreet($street);
		// 	$this->setCity($city); 
		// 	$this->setPhone($phone);
		// 	$this->setPostalcode($postalcode); 
		// 	$this->setMain($main);
		// }

		public static function newAddress($addresseble_id,$addressebleType,$no_maison,$street,$city,$phone,$postalcode,$main)
		{
			$address = new Address();
			$address->setAddressebleId($addresseble_id);
			$address->setType($addressebleType);
			$address->setNoMaison($no_maison);
			$address->setStreet($street);
			$address->setCity($city); 
			$address->setPhone($phone);
			$address->setPostalcode($postalcode); 
			$address->setMain($main);
			$address->save();
		}

		public function save()
		{
			$mysqli = new mysqli("localhost", "root", "root", "LOG210");
			if(empty($this->id))
			{
				$query = "INSERT INTO address (adresseble_id,adresseble_type,no_maison,street,city,phone,postalcode,main) VALUES ('$this->addressebleId','$this->addressebleType','$this->no_maison','$this->street','$this->city','$this->phone','$this->postalcode','$this->main')";
				$result = $mysqli->query($query);
				return $result;
			}
			else
			{
				$query = "UPDATE address SET no_maison='$this->no_maison',street='$this->street',city='$this->city',phone='$this->phone',postalcode='$this->postalcode' WHERE adresseble_id = $this->addressebleId AND adresseble_type = '$this->addressebleType'";
				$result = $mysqli->query($query);
				return $result;
			}
			$mysqli->close();
		}

	}