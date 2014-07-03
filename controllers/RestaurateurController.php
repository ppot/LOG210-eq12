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
    	$result = Restaurant::getRestaurantById($id);
		echo json_encode($result);
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
	    	$result = Restaurant::addMenu($name);		
			echo json_encode($result);
		}
	}

	public static function getMenus()
	{
		$id = $_SESSION['id'];
		Restaurant::setId($id);
    	$result = Restaurant::getMenus();
		echo json_encode($result);
	}

	public static function getMenu()
	{
		$id = $_GET['id'];
    	$result = Menu::getMenu($id);
		echo json_encode($result);
	}

	public static function updateMenu()
	{
		$id = $_GET['id'];
		$name = $_GET['name'];
    	Menu::setId($id);
    	Menu::setName($name);
    	$result = Menu::save();
		echo json_encode($result);
	}

	public static function createPlat()
	{
		$menu_id = $_GET['menu_id'];
		$name = $_GET['name'];
		$price = $_GET['price'];
		$description = $_GET['description'];
    	Menu::setId($menu_id);
		$result = Menu::addPlat($name, $price, $description);
		echo json_encode($result);
	}

	public static function getPlats()
	{
		$menu_id = $_GET['menu_id'];
		Menu::setId($menu_id);
		$result = Menu::getPlats();
		echo json_encode($result);
	}

	public static function getPlat()
	{
		$id = $_GET['id'];
    	$result = Plat::getById($id);
		echo json_encode($result);
	}

	public static function updatePlat()
	{
		$id = $_GET['id'];

		$name = $_GET['name'];
		$price = $_GET['price'];
		$description = $_GET['description'];
    	
		Plat::setId($id);
		Plat::setName($name);
		Plat::setPrice($price);
		Plat::setDecription($description);

		$result = Plat::save();

		echo json_encode($result);
	}

	public static function delPlat()
	{
		$id = $_GET['id'];
    	Plat::setId($id);
    	$result = Plat::remove();
		echo json_encode($result);
	}
}
