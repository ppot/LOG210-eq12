<?php
	require_once('../controller/Users.php');
	require_once('../controller/Entrepreneur.php');
	require_once('../controller/Restaurateur.php');
	require_once('../controller/Orders.php');	

	if(isset($_GET['action'])) {
		$action = $_GET['action'];
		switch ($action) {
//--	//connection
			case 'oauth':
				Users::oauth();
				break;
			case 'out':
				Users::out();
				break;
//--	//users
			case 'register':
				Users::register();
				break;	
			case 'getUser':
				Users::getUser();		
				break;
				
			case 'mainAddress':
				Users::address();
				break;

			case 'updateUserAddress':
				Users::updateAddress();
				break;

			case 'updateUserPassword':
				Users::updatePassword();
				break;
				
			case 'users':
				Users::users();
				break;

			case 'current':
				Users::getUser();
				break;

			case 'getDeliveryAddress':
				Users::getDeliveryAddress();
				break;

			case 'getAddress':
				Users::getAddress();
				break;		

			case 'newDeliveryAddress':
				Users::newDeliveryAddress();
				break;

			case 'changeDeliveryAddress':
				Users::changeDeliveryAddress();
				break;					

//--	//entrepreneur

//------	//restaurateur
			case 'getRestaurateurs':
				Entrepreneur::getRestaurateurs();
				break;
			case 'getRestaurateur':
				Entrepreneur::getRestaurateur();
				break;
			case 'updateRestaurateurPassword':
				Entrepreneur::updateRestaurateurPassword();
				break;	
			case 'updateRestaurateurRestaurant':
				Entrepreneur::updateRestaurateurRestaurant();
				break;
			case 'createRestaurateur':
				Entrepreneur::createRestaurateur();
				break;
			case 'delRestaurateur':
				Entrepreneur::delRestaurateur();
				break;
			case 'getRestaurateurRestaurant':
				Entrepreneur::getRestaurateurRestaurant();
				break;

//------	//restaurant
			case 'getRestaurants':
				Entrepreneur::getRestaurants();
				break;	
			case 'getRestaurant':
				Entrepreneur::getRestaurant();
				break;		
			case 'updateRestaurant':
				Entrepreneur::updateRestaurant();
				break;
			case 'getRestaurantsNoRestaurateur':
				Entrepreneur::getRestaurantsNoRestaurateur();
				break;
			case 'getRestaurateursNotInRestaurants':
				Entrepreneur::getRestaurateursNotInRestaurants();
				break;
			case 'createRestaurant':
				Entrepreneur::createRestaurant();
				break;
			case 'delRestaurant':
				Entrepreneur::delRestaurant();
				break;

//--	//restaurateur
			case 'getRestaurantRestaurateur':
				Restaurateur::getRestaurant();
				break;	
			case 'getMenu':
				Restaurateur::getMenu();
				break;				
			case 'getMenus':
				Restaurateur::getMenus();
				break;
			case 'addMenu':
				Restaurateur::addMenu();
				break;	
			case 'updateMenu':
				Restaurateur::updateMenu();
				break;	
			case 'createPlat':
				Restaurateur::createPlat();
				break;		
			case 'getPlats':
				Restaurateur::getPlats();
				break;
			case 'getPlat':
				Restaurateur::getPlat();
				break;		
			case 'updatePlat':
				Restaurateur::updatePlat();
				break;	
			case 'delPlat':
				Restaurateur::delPlat();
				break;	
			case 'getRestaurantMenus':
				Restaurateur::getRestaurantMenus();
				break;		
			case 'processCart':
				if(isset($_GET['cart']) && isset($_GET['command']))
				{
				  $_SESSION['cart'] = $_GET['cart'];
				  $_SESSION['command'] = $_GET['command'];
				}
				break;
			default:
				# code...
				break;
		}
	}
