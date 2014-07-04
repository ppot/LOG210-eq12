<?php
	require_once('../models/User.php');
	require_once('../models/Restaurant.php');
/**
* EntrepreneurController
*/
class EntrepreneurController
{
	function __construct() {}


// Restaurateur
	public static function getRestaurateur()
	{
		$id = $_GET['id'];
		$user = User::getUserById($id);
		echo json_encode($user);
	}

	public static function getRestaurateurRestaurant()
	{
		$id = $_GET['id'];
		$restaurantId = Restaurant::getRestaurantsForRestaurateurId($id);
		echo json_encode($restaurantId);
	}

	public static function getRestaurateurs()
	{
		$users = User::getUsers('restaurateur');
		echo json_encode($users);
	}

	public static function createRestaurateur()
	{
		$password = $_GET['password'];
		$firstname = $_GET['firstname'];
		$lastname = $_GET['lastname'];
		$mail = $_GET['mail'];

		$restaurantSelected = $_GET['restaurant'];

		$user = (empty($mail) || empty($password) || empty($firstname) || empty($lastname));

		if($user) 
		{
			echo json_encode(0);
		}
		else 
		{
			$user = User::userExist($mail);

			if($user != null)
			{
				echo json_encode(2);
			}
			else
			{
				$user = new User();
				$user->setPassword($password);
				$user->setFirstname($firstname);
				$user->setLastname($lastname);
				$user->setType('restaurateur'); 
				$user->setMail($mail);
				$user->save();

				if($restaurantSelected != -1)
				{
					$restaurant = Restaurant::getRestaurantById($restaurantSelected);
					$restaurant->setRestaurateurId($user->id);
					$restaurant->save();
				}

				echo json_encode(1);
			}
		}
	}

	public static function updateRestaurateurPassword()
	{
		$id = $_GET['id'];
		$password = $_GET['password'];

		$update = (empty($password));
		if($update) 
		{
			echo json_encode(0);
		}
		else 
		{
			$user=User::getUserById($id);
			$user->changePassword($password);
			$userResult=$user->save();
			echo json_encode(1);
		}
	}

	public static function updateRestaurateurRestaurant()
	{
		$id = $_GET['id'];
		$restaurantId = $_GET['restaurantId'];
		if($restaurantId == -1)
		{
			$restaurant = Restaurant::getRestaurantRestaurateurId($id);
			$restaurant ->setRestaurateurId(-1);
			$result = $restaurant->save();
			echo json_encode($result);
		}
		else
		{
			$restaurant = Restaurant::getRestaurantById($restaurantId);
			$restaurant->setRestaurateurId($id);
			$result = $restaurant->save();
			echo json_encode($result);
		}
	}

	public static function delRestaurateur()
	{
		$id = $_GET['id'];
			$restaurant = Restaurant::getRestaurantRestaurateurId($id);
			$restaurant ->setRestaurateurId(-1);
			$result = $restaurant->save();
		$result= User::delete($id);	
		echo json_encode($result);
	}

// Restaurant
	public static function getRestaurant()
	{
		$id = $_GET['id'];
		$restaurant = Restaurant::getRestaurantById($id);
		echo json_encode($restaurant);
	}

	public static function getRestaurants()
	{
		$restaurants = Restaurant::getRestaurants();
		echo json_encode($restaurants);
	}

	public static function getRestaurantsNoRestaurateur()
	{
		$restaurants = Restaurant::getRestaurantsNoRestaurateur();
		echo json_encode($restaurants);
	}

	public static function getRestaurateursNotInRestaurants()
	{
		$restaurateur = User::getRestaurateursNotInRestaurants();
		echo json_encode($restaurateur);
	}

	public static function createRestaurant() 
	{
		$restaurantName = $_GET['name'];
		$restaurateur_id = $_GET['restaurateur_id'];
		$addresse = $_GET['address'];
		$city = $_GET['city'];
		$phone = $_GET['phone'];
		$postalcode = $_GET['postalcode'];

		$name = empty($restaurantName);
		$address = (empty($addresse) || empty($city) || empty($phone) || empty($postalcode));

		if($name || $address) 
		{
			echo json_encode(0);
		}
		else 
		{
			$restaurant = new Restaurant();
			$restaurant->setName($restaurantName);
			$restaurant->setRestaurateurId($restaurateur_id);

			$restaurant->save();

			$restaurant->newAddress($addresse, $city, $phone, $postalcode);
			echo json_encode(1);
		}
	}

	public static function updateRestaurant()
	{
		$id = $_GET['id'];
		$restaurantName = $_GET['name'];
		$restaurateur_id = $_GET['restaurateur_id'];
		$addresse = $_GET['address'];
		$city = $_GET['city'];
		$phone = $_GET['phone'];
		$postalcode = $_GET['postalcode'];

		$name = empty($restaurantName);
		$address = (empty($addresse) || empty($city) || empty($phone) || empty($postalcode));

		if($name || $address) 
		{
			echo json_encode(0);
		}
		else 
		{
			$restaurant = Restaurant::getRestaurantById($id);
			$restaurant->setName($restaurantName);
			$restaurant->setRestaurateurId($restaurateur_id);
			$restaurant->save();
			$restaurant->changeAddress($addresse, $city, $phone, $postalcode);

			echo json_encode(1);
		}
	}

	public static function delRestaurant($id)
	{
		$id = $_GET['id'];
		$result= Restaurant::delete($id);
		echo json_encode($result);	
	}
}
