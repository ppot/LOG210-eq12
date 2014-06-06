<?php
	require_once('../models/User.php');
	class Users {
		public function __construct() {}

		public static function  getUser(){

			$user = User::getCurrentUser();

			 echo json_encode($user->getMainAddress());
		}
        
       	public static function oauth()
       	 {
			$mysqli = Connection::getConnection();
			$mail = $mysqli->real_escape_string($_GET['lMail']);
			$password = $mysqli->real_escape_string($_GET['password']);
			$sql_query = "SELECT * FROM Users WHERE mail='$mail' AND password='$password'";
			$result = $mysqli->query($sql_query);
			$row = $result->fetch_array(MYSQLI_ASSOC);
			if(!empty($row['mail'] && !empty($row['password']))) {
				$_SESSION['user'] = $row['mail'];
				$_SESSION['id'] = $row['id'];
				echo json_encode(1);
			}
			else{
				echo json_encode(0);
			}

			Connection::disconnect();
		}

		public static function out()
		{
			if($_SESSION['user'] != "" && $_SESSION['id'] != "")
			{
				unset($_SESSION['username']);
				unset($_SESSION['id']);
			}
		}

		public static function register()
		{
			$password = $mysqli->real_escape_string($_GET['password']);
			$firstname = $mysqli->real_escape_string($_GET['firstname']);
			$lastname = $mysqli->real_escape_string($_GET['lastname']);

			$mail = $mysqli->real_escape_string($_GET['mail']);
			$birthdate = $mysqli->real_escape_string($_GET['birthdate']);

			$address = $mysqli->real_escape_string($_GET['address']);
			$city = $mysqli->real_escape_string($_GET['city']);
			$phone =  $mysqli->real_escape_string($_GET['phone']);
			$postalcode = $mysqli->real_escape_string($_GET['postalcode']);	

			$user = (empty($mail) || empty($password) || empty($firstname) || empty($lastname));
			$infos = empty($birthdate));
			$address = empty($address) || empty($city) || empty($phone) || empty($postalcode));

			if($user || $infos || $address) {
				echo json_encode(0);
			}
			else {
				$date =  date('Y-m-d', strtotime($birthdate));
				$user = new User();
				$user->setPassword($password);
				$user->setFirstname($firstname);
				$user->setLastname($lastname);
				$user->setType('client'); 
				$user->setMail($mail);
				$user->setBirthdate($date);
				$user->save();

				$user->newAddress($address, $city, $phone, $postalcode);

				echo json_encode(1);
			}
		}

		public static function userInfos() {
			$user = User::getCurrentUser();
			$mysqli = Connection::getConnection();

			$sql_address = "SELECT * FROM address as a INNER JOIN users as u ON a.adresseble_id=u.id WHERE adresseble_id = $user->id AND adresseble_type = '$user->type' AND main='1'";
			$result = $mysqli->query($sql_address);
			$row = $result->fetch_assoc();
			echo json_encode($row);
			Connection::disconnect();
		}


		public static function update()
		{
			$mysqli = Connection::getConnection();
			$id = $_SESSION['id'];

			$address = $mysqli->real_escape_string($_GET['address']);
			$city = $mysqli->real_escape_string($_GET['city']);
			$phone =  $mysqli->real_escape_string($_GET['phone']);
			$postalcode = $mysqli->real_escape_string($_GET['postalcode']);	
			$password = $mysqli->real_escape_string($_GET['password']);

			$update = (empty($password) || empty($address) || empty($city) || empty($phone) || empty($postalcode));
			if($update) {
				echo json_encode(0);
			}
			else {
				$user=User::getCurrentUser();
				$user->changePassword($password);
				$userResult=$user->save();
				$addressResult = $user->updateAddress($address, $city, $phone, $postalcode);
				echo json_encode($userResult + $addressResult);
			}

			Connection::disconnect();
		}

    }