<?php
	require_once('../controllers/UserIndexController.php');

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
			
			default:
				# code...
				break;
		}
	}
