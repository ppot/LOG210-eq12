<?php
	require_once('../models/Order.php');	
/**
* Order Controller
*/
class Orders
{
	
	function __construct(){}

	public static function createOrder()
	{
		 $client_id = $_GET['client_id'];
		 $address_id =  $_GET['address_id'];
		 $restaurant_id = $_GET['restaurant_id'];
		 $livreur_id = $_GET['livreur_id'];
		 $date = $_GET['date'];
		 $time = $_GET['time'];
		 $state = $_GET['state'];
		 $total = $_GET['total'];
		 $noConfrmation = substr(md5(rand(0, 1000000)), 0, 6);

		$order = new Order();
		$order->setClientId($client_id);
		$order->setAddressId($address_id);
		$order->setRestaurantId($restaurant_id);
		$order->setNoConfirmation($noConfrmation);
		$order->setDate($date);
		$order->setTime($time);
		$order->setState(1);
		$order->setTotal($total);
		$order->save();
		echo json_encode($order);
	}

	public static function createOrderItems()
	{
		 $order_id = $_GET['order_id'];
		 $plat_id =  $_GET['plat_id'];
		 $quantity = $_GET['quantity'];

		 $order = Order::getById($order_id);
		 $order->addItems($plat_id,$quantity);
	}

	public static function orderProcess()
	{

	}
}