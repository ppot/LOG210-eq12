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
    	//
    	//......
    	//
		echo json_encode(null);
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
	    	//
	    	//......
	    	//			
			echo json_encode(null);
		}
	}

	public static function getMenus()
	{
		$id = $_SESSION['id'];
    	//
    	//......
    	//		
		echo json_encode(null);
	}

	public static function getMenu()
	{
		$id = $_GET['id'];
    	//
    	//......
    	//	
		echo json_encode(null);
	}

	public static function updateMenu()
	{
		$id = $_GET['id'];
		$name = $_GET['name'];
    	//
    	//......
    	//
		echo json_encode(null);
	}

	public static function createPlat()
	{
		$menu_id = $_GET['menu_id'];
		$name = $_GET['name'];
		$price = $_GET['price'];
		$description = $_GET['description'];
    	//
    	//......
    	//
		echo json_encode(null);
	}

	public static function getPlats()
	{
		$menu_id = $_GET['menu_id'];
    	//
    	//......
    	//
		echo json_encode(null);
	}

	public static function getPlat()
	{
		$id = $_GET['id'];
    	//
    	//......
    	//
		echo json_encode(null);
	}

	public static function updatePlat()
	{
		$id = $_GET['id'];

		$name = $_GET['name'];
		$price = $_GET['price'];
		$description = $_GET['description'];
    	//
    	//......
    	//
		echo json_encode(null);
	}

	public static function delPlat()
	{
		$id = $_GET['id'];
    	//
    	//......
    	//
		echo json_encode(null);
	}

}
?>