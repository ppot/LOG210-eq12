<?php
	// require('action/Connect.php');
	session_start();

	if(isset($_GET['action']))
	{
		$action = $_GET['action'];
		switch ($action) 
		{
			case 'oauth':
				oauth();
				break;
			case 'oauthOut':
				oauthOut();
				break;
			case 'register':
				register();
				break;

			case 'updateUser':
				updateUser();
				break;
			case 'users':
				users();
				break;
			
			default:
				# code...
				break;
		}
	}

	function oauth(){
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

	function oauthOut(){
		if($_SESSION['username'] != "" && $_SESSION['id'] != "")
		{
			unset($_SESSION['username']);
			unset($_SESSION['id']);
			session_destroy();
		}
	}

	function register()
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
		$sql_user = "INSERT INTO users (username, password, firstname, lastname, type) VALUES ('$username','$password','$firstname','$lastname','client')";


		if($user || $infos || $address)
		{
			echo json_encode(0);
		}
		else
		{
			$userResult = $mysqli->query($sql_user);
			$id = $mysqli->insert_id;
			$date =  date('Y-m-d', strtotime($birthdate));
			$sql_infos = "INSERT INTO usersInfos (users_id, mail, birthdate) VALUES ('$id','$mail','$date')";
			$infosResult = $mysqli->query($sql_infos);
			$sql_address = "INSERT INTO address (adresseble_id,adresseble_type,no_maison,street,city,phone,postalcode,main) VALUES ('$id','client','$no_maison','$street','$city','$phone','$postalcode','1')";
			$addressResult = $mysqli->query($sql_address);

			echo json_encode($userResult + $infosResult + $addressResult);
		}
			
		$mysqli->close();
	}



	function updateUser(){
		$mysqli = new mysqli("localhost", "root", "root", "LOG210");
		$id = $_SESSION['id'];

		$no_maison = $mysqli->real_escape_string($_GET['no_maison']);
		$street = $mysqli->real_escape_string($_GET['street']);
		$city = $mysqli->real_escape_string($_GET['city']);
		$phone =  $mysqli->real_escape_string($_GET['phone']);
		$postalcode = $mysqli->real_escape_string($_GET['postalcode']);	
		$password = $mysqli->real_escape_string($_GET['password']);

		$update = (empty($password) || empty($no_maison) || empty($street) || empty($city) || empty($phone) || empty($postalcode));
		if($address)
		{
			echo json_encode(0);
		}
		else
		{
			$sql_user = "UPDATE users SET password='$password' WHERE id='$id'";
			$userResult = $mysqli->query($sql_user);
			$sql_address = "UPDATE address SET no_maison='$no_maison',street='$street',city='$city',phone='$phone',postalcode='$postalcode' WHERE adresseble_id = $id AND adresseble_type = 'client'";
			$addressResult = $mysqli->query($sql_address);
			echo json_encode($userResult + $addressResult);
		}

		$mysqli->close();
	}

	function users(){
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

// ?>