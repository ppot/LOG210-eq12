<?php
	require_once('../controllers/UserIndexController.php');
	require_once('../controllers/EntrepreneurController.php');

	if(isset($_GET['action'])) {
		$action = $_GET['action'];
		switch ($action) {
			case 'oauth':
				Users::oauth();
				break;

			case 'oauthOut':
				Users::out();
				break;

			case 'register':
				Users::register();
				break;

			case 'user_infos':
				Users::userInfos();
				break;

			case 'updateUser':
				Users::update();
				break;
				
			case 'users':
				Users::users();
				break;

			case 'current':
				Users::getUser();
				break;

			case 'createRest':
				EntrepreneurController::createRestaurant();
				break;

			case 'resto_infos':
				EntrepreneurController::restoInfos();
				break;
			
			default:
				# code...
				break;
		}
	}
