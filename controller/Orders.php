<?php
	require_once('../action/db/Connection.php');
	require_once('../models/User.php');	
	require_once('../models/Order.php');
	require_once('../action/mail.php');
/**
* Order Controller
*/
class Orders
{
	
	function __construct(){}

	public static function paypalPaymentOrder($client_id,$address_id,$restaurant_id,$noConfrmation,$date,$time,$total)
	{
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

		return $order;
	}

	public static function paypalPaymentItems($order_id,$plat_id,$quantity)
	{
		 $order = Order::getById($order_id);
		 $order->addItems($plat_id,$quantity);
	}


	public static function getOrder()
	{
		$order_id = $_GET['order_id'];
		$order = Order::getById($order_id); 
		echo json_encode($order);
	}

	public static function getOrderItems()
	{
		 $order_id = $_GET['order_id'];
		 $orderItems = Order::getOrderItems($order_id);
		 echo json_encode($orderItems);
	}

	public static function orderReady()
	{
		$order_id = $_GET['order_id'];
 		$order = Order::getById($order_id); 
 		$order->ready();

 		$user = User::getUserById($order->client_id);
 		$tx = $order->no_confirmation;
		$message = "Order with token: .$tx is prepare and ready. \n It will be deliver shortly";
		Mail::sendMail($user->firstname,$user->lastname,$user->mail,$message);

 		echo json_encode($order);
	}

	public static function orderDeliver()
	{
		$order_id = $_GET['order_id'];
 		$order = Order::getById($order_id); 
 		$order->deliver();

 		$user = User::getUserById($order->client_id);
 		$tx = $order->no_confirmation;
		$message = "Order with token: .$tx is ready and being deliver";
		Mail::sendMail($user->firstname,$user->lastname,$user->mail,$message);

 		echo json_encode($order);
	}

}