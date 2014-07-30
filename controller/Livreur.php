<?php
	require_once('../action/db/Connection.php');
	require_once('../models/Order.php');

class Livreur {

	function __construct() {}

	public static function getAllOrders() {
		$allOrders = Order::getAllOrders();
		echo json_encode($allOrders);
	}

	//public static function changeStateDelivered() {
	//	$result = Order::changeStateDelivered();
	//	echo 
	//}
}
