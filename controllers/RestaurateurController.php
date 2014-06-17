<?php
	require_once('../models/Restaurant.php');
	require_once('../models/Menu.php');
	require_once('../models/Plat.php');	
/**
* RestaurateurController
*/
class RestaurateurController
{
	
	function __construct() {}


	public static function getRestaurant()
	{
		$id = $_SESSION['id'];
<<<<<<< HEAD
		$restaurant = Restaurant::getRestaurantRestaurateurId($id);
		echo json_encode($restaurant);
=======
    	//
    	//......
    	//
		echo json_encode(null);
>>>>>>> ADD CU1/CU8 + CU5 to complete
	}

	public static function addMenu()
	{
		$name = $_GET['name'];
		if(empty($name))
		{
			echo json_encode(0);
		}
		else
		{
			$id = $_SESSION['id'];
<<<<<<< HEAD
			$restaurant = Restaurant::getRestaurantRestaurateurId($id);	
			echo json_encode($restaurant->addMenu($name));
=======
	    	//
	    	//......
	    	//			
			echo json_encode(null);
>>>>>>> ADD CU1/CU8 + CU5 to complete
		}
	}

	public static function getMenus()
	{
		$id = $_SESSION['id'];
<<<<<<< HEAD
		$restaurant = Restaurant::getRestaurantRestaurateurId($id);	
		echo json_encode($restaurant->getMenus());
=======
    	//
    	//......
    	//		
		echo json_encode(null);
>>>>>>> ADD CU1/CU8 + CU5 to complete
	}

	public static function getMenu()
	{
		$id = $_GET['id'];
<<<<<<< HEAD
		$menu = Menu::getMenu($id);	
		echo json_encode($menu);
=======
    	//
    	//......
    	//	
		echo json_encode(null);
>>>>>>> ADD CU1/CU8 + CU5 to complete
	}

	public static function updateMenu()
	{
		$id = $_GET['id'];
		$name = $_GET['name'];
<<<<<<< HEAD
		$menu = Menu::getMenu($id);	
		$menu->setName($name);
		$result = $menu->save();
		echo json_encode($result);
=======
    	//
    	//......
    	//
		echo json_encode(null);
>>>>>>> ADD CU1/CU8 + CU5 to complete
	}

	public static function createPlat()
	{
		$menu_id = $_GET['menu_id'];
		$name = $_GET['name'];
		$price = $_GET['price'];
		$description = $_GET['description'];
<<<<<<< HEAD

		$menu = Menu::getMenu($menu_id);
		$plat = $menu->addPlat($name,$price,$description);
		echo json_encode($plat);
=======
    	//
    	//......
    	//
		echo json_encode(null);
>>>>>>> ADD CU1/CU8 + CU5 to complete
	}

	public static function getPlats()
	{
		$menu_id = $_GET['menu_id'];
<<<<<<< HEAD
		$menu = Menu::getMenu($menu_id);

		echo json_encode($menu->getPlats());
=======
    	//
    	//......
    	//
		echo json_encode(null);
>>>>>>> ADD CU1/CU8 + CU5 to complete
	}

	public static function getPlat()
	{
		$id = $_GET['id'];
<<<<<<< HEAD
		$plat = Plat::getById($id);
		echo json_encode($plat);
=======
    	//
    	//......
    	//
		echo json_encode(null);
>>>>>>> ADD CU1/CU8 + CU5 to complete
	}

	public static function updatePlat()
	{
		$id = $_GET['id'];

		$name = $_GET['name'];
		$price = $_GET['price'];
		$description = $_GET['description'];
<<<<<<< HEAD

		$plat = Plat::getById($id);
		$plat->setName($name);
		$plat->setPrice($price);
		$plat->setDescription($description);	
		$result = $plat->save();
		echo json_encode($result);
=======
    	//
    	//......
    	//
		echo json_encode(null);
>>>>>>> ADD CU1/CU8 + CU5 to complete
	}

	public static function delPlat()
	{
		$id = $_GET['id'];
<<<<<<< HEAD
		$plat = Plat::getById(id);
		$result = $plat->remove();
		echo json_encode($result);
	}


	public static function getRestaurantMenu()
	{
		$id = $_GET['id'];
		$menu = Menu::getForRestaurantId($id);
		echo json_encode($menu);
=======
    	//
    	//......
    	//
		echo json_encode(null);
>>>>>>> ADD CU1/CU8 + CU5 to complete
	}

}
?>