<?php
	require_once('../action/db/Connection.php');
	require_once('../models/Restaurant.php');
	require_once('../models/Menu.php');
	require_once('../models/Plat.php');	
/**
* RestaurateurController
*/
class Restaurateur
{
	function __construct() {}

	public static function getRestaurant()
	{
		$id = $_SESSION['id'];
		$restaurant = Restaurant::getRestaurantRestaurateurId($id);
		echo json_encode($restaurant);
	}

	public static function getRestaurantNotEncoded(){
		$id = $_SESSION['id'];
		$restaurant = Restaurant::getRestaurantRestaurateurId($id);
		return $restaurant;
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
			$restaurant = Restaurant::getRestaurantRestaurateurId($id);
			echo json_encode($restaurant->addMenu($name));
		}
	}

	public static function getMenus()
	{
		$id = $_SESSION['id'];
		$restaurant = Restaurant::getRestaurantRestaurateurId($id);	
		echo json_encode($restaurant->getMenus());
	}

	public static function getMenu()
	{
		$id = $_GET['id'];
		$menu = Menu::getMenu($id);	
		echo json_encode($menu);
	}

	public static function updateMenu()
	{
		$id = $_GET['id'];
		$name = $_GET['name'];
		$menu = Menu::getMenu($id);	
		$menu->setName($name);
		$result = $menu->save();
		echo json_encode($result);
	}

	public static function createPlat()
	{
		$menu_id = $_GET['menu_id'];
		$name = $_GET['name'];
		$price = $_GET['price'];
		$description = $_GET['description'];

		$menu = Menu::getMenu($menu_id);
		$plat = $menu->addPlat($name,$price,$description);
		echo json_encode($plat);
	}

	public static function getPlats()
	{
		$menu_id = $_GET['menu_id'];
		$menu = Menu::getMenu($menu_id);

		echo json_encode($menu->getPlats());
	}

	public static function getPlat()
	{
		$id = $_GET['id'];
		$plat = Plat::getById($id);
		echo json_encode($plat);
	}

	public static function updatePlat()
	{
		$id = $_GET['id'];

		$name = $_GET['name'];
		$price = $_GET['price'];
		$description = $_GET['description'];

		$plat = Plat::getById($id);
		$plat->setName($name);
		$plat->setPrice($price);
		$plat->setDescription($description);	
		$result = $plat->save();
		echo json_encode($result);
	}

	public static function delPlat()
	{
		$id = $_GET['id'];
		$plat = Plat::getById($id);
		$result = $plat->remove();
		echo json_encode($result);
	}

	public static function getRestaurantMenus()
	{
		$id = $_GET['id'];
		$menu = Menu::getForRestaurantId($id);
		echo json_encode($menu);
	}

}
?>