<?php
	require_once('../controller/Users.php');
	require_once('../controller/Entrepreneur.php');
	require_once('../controller/Restaurateur.php');
	require_once('../controller/Orders.php');	
	require_once('../controllers/UserIndexController.php');
	require_once('../controllers/EntrepreneurController.php');
	require_once('../controllers/RestaurateurController.php');

	if(isset($_GET['action'])) {
		$action = $_GET['action'];
		switch ($action) {
<<<<<<< HEAD
//--	//connection
=======
		//connection
>>>>>>> ADD CU1/CU8 + CU5 to complete
			case 'oauth':
				Users::oauth();
				break;
			case 'out':
				Users::out();
				break;
<<<<<<< HEAD
//--	//users
=======
		//users
>>>>>>> ADD CU1/CU8 + CU5 to complete
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

<<<<<<< HEAD
=======
			case 'updateUserAddress':
				Users::updateAddress();
				break;

>>>>>>> ADD bootstrap / restyling
			case 'updateUserPassword':
				Users::updatePassword();
				break;
				
			case 'users':
				Users::users();
				break;

			case 'current':
				Users::getUser();
				break;
<<<<<<< HEAD

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
			case 'createOrder':
				Orders::createOrder();
				break;		
			case 'createOrderItems':
				Orders::createOrderItems();
				break;

=======
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
>>>>>>> ADD CU1/CU8 + CU5 to complete
			default:
				# code...
				break;
		}
	}
