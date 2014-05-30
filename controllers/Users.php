<?php
	session_start();
	require_once('../models/User.php');
	class Users 
	{

		public function __construct() 
		{
			
		}
		public static function  getUser(){

			$user = User::getCurrentUser();

			 echo json_encode($user->getMainAddress());
		}
        
       	public static function oauth()
       	{
			$mysqli = new mysqli("localhost", "root", "root", "LOG210");
			$username = $mysqli->real_escape_string($_GET['username']);
			$password = $mysqli->real_escape_string($_GET['password']);
			$sql_query = "SELECT * FROM Users WHERE username='$username' AND password='$password'";
			$result = $mysqli->query($sql_query);
			$row = $result->fetch_array(MYSQLI_ASSOC);
			if(!empty($row['username'] && !empty($row['password'])))
			{
				$_SESSION['username'] = $row['username'];
				$_SESSION['id'] = $row['id'];
				echo json_encode(1);
			}
			else{
				echo json_encode(0);
			}

			$mysqli->close();
		}

		public static function out()
		{
			if($_SESSION['username'] != "" && $_SESSION['id'] != "")
			{
				unset($_SESSION['username']);
				unset($_SESSION['id']);
				session_destroy();
			}
		}

		public static function register()
		{
			$mysqli = new mysqli("localhost", "root", "root", "LOG210");
		    $username = $mysqli->real_escape_string($_GET['username']);
			$password = $mysqli->real_escape_string($_GET['password']);
			$firstname = $mysqli->real_escape_string($_GET['firstname']);
			$lastname = $mysqli->real_escape_string($_GET['lastname']);

			$mail = $mysqli->real_escape_string($_GET['mail']);
			$birthdate = $mysqli->real_escape_string($_GET['birthdate']);


			$no_maison = $mysqli->real_escape_string($_GET['no_maison']);
			$street = $mysqli->real_escape_string($_GET['street']);
			$city = $mysqli->real_escape_string($_GET['city']);
			$phone =  $mysqli->real_escape_string($_GET['phone']);
			$postalcode = $mysqli->real_escape_string($_GET['postalcode']);	

			$user = (empty($username) || empty($password) || empty($firstname) || empty($lastname));
			$infos = (empty($mail) || empty($birthdate));
			$address = (empty($no_maison) || empty($street) || empty($city) || empty($phone) || empty($postalcode));

			if($user || $infos || $address)
			{
				echo json_encode(0);
			}
			else
			{
				$date =  date('Y-m-d', strtotime($birthdate));
				$user = new User();
				$user->setUsername($username);
				$user->setPassword($password);
				$user->setFirstname($firstname);
				$user->setLastname($lastname);
				$user->setType('client'); 
				$user->setMail($mail);
				$user->setBirthdate($date);
				$user->save();

				$user->newAddress($no_maison,$street,$city,$phone,$postalcode);

				echo json_encode(1);
			}
				
			$mysqli->close();
		}

		public static function userInfos()
		{

			$user = User::getCurrentUser();
			$mysqli = new mysqli("localhost", "root", "root", "LOG210");

			$sql_address = "SELECT * FROM address as a INNER JOIN users as u ON a.adresseble_id=u.id WHERE adresseble_id = $user->id AND adresseble_type = '$user->type' AND main='1'";
			$result = $mysqli->query($sql_address);
			$row = $result->fetch_assoc();
			echo json_encode($row);
			$mysqli->close();
		}


		public static function update()
		{
			$mysqli = new mysqli("localhost", "root", "root", "LOG210");
			$id = $_SESSION['id'];

			$no_maison = $mysqli->real_escape_string($_GET['no_maison']);
			$street = $mysqli->real_escape_string($_GET['street']);
			$city = $mysqli->real_escape_string($_GET['city']);
			$phone =  $mysqli->real_escape_string($_GET['phone']);
			$postalcode = $mysqli->real_escape_string($_GET['postalcode']);	
			$password = $mysqli->real_escape_string($_GET['password']);

			$update = (empty($password) || empty($no_maison) || empty($street) || empty($city) || empty($phone) || empty($postalcode));
			if($update)
			{
				echo json_encode(0);
			}
			else
			{
				$user=User::getCurrentUser();
				$user->changePassword($password);
				$userResult=$user->save();
				$addressResult = $user->updateAddress($no_maison,$street,$city,$phone,$postalcode);
				echo json_encode($userResult + $addressResult);
			}

			$mysqli->close();
		}

		public static function users()
		{
			$mysqli = new mysqli("localhost", "root", "root", "LOG210");
	 		$sql_query = "SELECT * FROM users";
		    $result = $mysqli->query($sql_query);
			$out = array();
			while ($row = $result->fetch_assoc()) {
			    $out[] = $row;
			}
			echo json_encode($out);
			
			$mysqli->close();
		}

		
    }