<?php
	require_once('../action/db/Connection.php');
	require_once('../models/User.php');
	class Users {
		public function __construct() {}

		public static function  getUser(){
			$user = User::getCurrentUser();
			 echo json_encode($user->getMainAddress());
		}
        
       	public static function oauth()
       	 {
       	 	$result = User::getUser($_GET['lMail'],$_GET['password']);
       	 	echo json_encode($result);
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
			// $password = $mysqli->real_escape_string($_GET['password']);
			// $firstname = $mysqli->real_escape_string($_GET['firstname']);
			// $lastname = $mysqli->real_escape_string($_GET['lastname']);

			// $mail = $mysqli->real_escape_string($_GET['mail']);
			// $birthdate = $mysqli->real_escape_string($_GET['birthdate']);

			// $address = $mysqli->real_escape_string($_GET['address']);
			// $city = $mysqli->real_escape_string($_GET['city']);
			// $phone =  $mysqli->real_escape_string($_GET['phone']);
			// $postalcode = $mysqli->real_escape_string($_GET['postalcode']);	
			$password = $_GET['password'];
			$firstname = $_GET['firstname'];
			$lastname = $_GET['lastname'];

			$mail = $_GET['mail'];
			$birthdate = $_GET['birthdate'];

			$addresse = $_GET['address'];
			$city = $_GET['city'];
			$phone = $_GET['phone'];
			$postalcode = $_GET['postalcode'];	


			$user = (empty($mail) || empty($password) || empty($firstname) || empty($lastname));
			$infos = empty($birthdate);
			$address = (empty($addresse) || empty($city) || empty($phone) || empty($postalcode));

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

				$user->newAddress($addresse, $city, $phone, $postalcode);

				echo json_encode(1);
			}
		}

		public static function userInfos() {
			$user = User::getCurrentUser();
			$address = $user->getMainAddress();
			echo json_encode($address);
		}


		public static function update()
		{
			$id = $_SESSION['id'];

			$address = $_GET['address'];
			$city = $_GET['city'];
			$phone =  $_GET['phone'];
			$postalcode =$_GET['postalcode'];	
			$password = $_GET['password'];

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
		}

    }