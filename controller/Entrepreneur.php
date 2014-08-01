<?php
	require_once('../action/db/Connection.php');
	require_once('../models/User.php');
	require_once('../models/Restaurant.php');
/**
* EntrepreneurController
*/
class Entrepreneur
{
	function __construct() {}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
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

		if(empty($password)) 
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
			if($restaurant->id != null){
				$restaurant ->setRestaurateurId(-1);
				$result = $restaurant->save();
				echo json_encode($result);	
			}
			else{
				echo json_encode(1);
			}
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

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
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
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	// Livreur
	public static function getLivreur()
	{
		$id = $_GET['id'];
		$user = User::getUserById($id);
		echo json_encode($user);
	}

	public static function getLivreurs()
	{
		$users = User::getUsers('livreur');
		echo json_encode($users);
	}

	public static function createLivreur()
	{
		$livPassword = $_GET['password'];
		$livFirstname = $_GET['firstname'];
		$livLastname = $_GET['lastname'];
		$livMail = $_GET['mail'];


		$user = (empty($livMail) || empty($livPassword) || empty($livFirstname) || empty($livLastname));

		if($user) 
		{
			echo json_encode(0);
		}
		else 
		{
			$user = User::userExist($livMail);

			if($user != null)
			{
				echo json_encode(2);
			}
			else
			{
				$user = new User();
				$user->setPassword($livPassword);
				$user->setFirstname($livFirstname);
				$user->setLastname($livLastname);
				$user->setType('livreur'); 
				$user->setMail($livMail);
				$user->save();

				echo json_encode(1);
			}
		}
	}

	public static function updateLivreurPassword()
	{
		$id = $_GET['id'];
		$livPassword = $_GET['password'];

		if(empty($livPassword)) 
		{
			echo json_encode(0);
		}
		else 
		{
			$user=User::getUserById($id);
			$user->changePassword($livPassword);
			$userResult=$user->save();
			echo json_encode(1);
		}
	}

	public static function delLivreur()
	{
		$id = $_GET['id'];
		$result= User::delete($id);	
		echo json_encode($result);
	}
}
?>