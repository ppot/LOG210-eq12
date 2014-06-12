<?php
	require_once('../action/db/Connection.php');
	require_once('../models/Restaurant.php');

	class EntrepreneurController {
		$this->iterator = 0;
		public function __construct() {}

		public static function createRestaurant() {
			$restName = $_GET['name'];

			$restAddress = $_GET['address'];
			$city = $_GET['city'];
			$phone = $_GET['telephone'];
			$postalCode = $_GET['postalCode'];

			$name = empty($restName);
			$address = (empty($restAddress) || empty($city) || empty($phone) || empty($postalCode));

			if($name || $address) {
				echo json_encode(0);
			}
			else {
				$restaurant = new Restaurant($restName, $restAddress, $city, $phone, $postalCode);
				$restaurant->save();

				json_encode(1);
			}
		}

		public static function restoInfos() {
			$restoArray = Restaurant::getAllRestaurants();
			$address = Restaurant::getMainAddress();

			//$this->iterator += $iterator;

			//if($iterator < count($restoArray) && $iterator > -1){
			//	$this->viewingResto = $restoArray($iterator);
			//}
			
			echo json_encode($address);
		}

    }