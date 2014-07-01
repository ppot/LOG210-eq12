<?php
	require_once('../controllers/UserIndexController.php');
	require_once('../controllers/EntrepreneurController.php');
	require_once('../controllers/RestaurateurController.php');

	if(isset($_GET['action'])) {
		$action = $_GET['action'];
		switch ($action) {
		//connection
			case 'oauth':
				Users::oauth();
				break;

			case 'oauthOut':
				Users::out();
				break;
		//users
			case 'register':
				Users::register();
				break;

			case 'user_infos':
				Users::userInfos();
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
		//entrepreneur restaurateur		
			case 'getRestaurateur':
				EntrepreneurController::getRestaurateur();
				break;
			case 'getRestaurateurRestaurant':
				EntrepreneurController::getRestaurateurRestaurant();
				break;
			case 'getRestaurateurs':
				EntrepreneurController::getRestaurateurs();
				break;				
			case 'createRestaurateur':
				EntrepreneurController::createRestaurateur();
				break;
			case 'updateRestaurateurPassword':
				EntrepreneurController::updateRestaurateurPassword();
				break;
			case 'updateRestaurateurRestaurant':
				EntrepreneurController::updateRestaurateurRestaurant();
				break;				
			case 'delRestaurateur':
				EntrepreneurController::delRestaurateur();
				break;
		//entrepreneur restaurant
			case 'getRestaurant':
				EntrepreneurController::getRestaurant();
				break;							
			case 'getRestaurants':
				EntrepreneurController::getRestaurants();
				break;				
			case 'createRestaurant':
				EntrepreneurController::createRestaurant();
				break;
			case 'updateRestaurant':
				EntrepreneurController::updateRestaurant();
				break;	
			case 'delRestaurant':
				EntrepreneurController::delRestaurant();
				break;	
			case 'getRestaurantsNoRestaurateur':
				EntrepreneurController::getRestaurantsNoRestaurateur();
				break;	
			case 'getRestaurateursNotInRestaurants':
				EntrepreneurController::getRestaurateursNotInRestaurants();
				break;
			//restaurateur menu
			case 'getRestaurantRestaurateur':
				RestaurateurController::getRestaurant();
				break;	
			case 'getMenu':
				RestaurateurController::getMenu();
				break;				
			case 'getMenus':
				RestaurateurController::getMenus();
				break;
			case 'addMenu':
				RestaurateurController::addMenu();
				break;	
			case 'updateMenu':
			RestaurateurController::updateMenu();
				break;	
			case 'createPlat':
				RestaurateurController::createPlat();
				break;		
			case 'getPlats':
				RestaurateurController::getPlats();
				break;
			case 'getPlat':
				RestaurateurController::getPlat();
				break;		
			case 'updatePlat':
				RestaurateurController::updatePlat();
				break;	
			case 'delPlat':
				RestaurateurController::delPlat();
				break;							
			default:
				# code...
				break;
		}
	}
