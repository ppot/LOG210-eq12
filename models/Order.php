<?php
	require_once('OrderItems.php');
/**
* Customer Order
*  array(
*    1 => "paid",
*    2 => "preparation",
*    3 => "ready"
*/
class Order
{
	public $id;
	public $client_id;
	public $address_id;
	public $restaurant_id;
	public $livreur_id;
	public $no_confirmation;
	public $date;
	public $time;
	public $state;
	public $total;
	
	function __construct() {}

	public function setId($id)
	{
		$this->id = $id;
	}

	public function setClientId($client_id)
	{
		$this->client_id = $client_id;
	}

	public function setAddressId($address_id)
	{
		$this->address_id = $address_id;
	}

	public function setRestaurantId($restaurant_id)
	{
		$this->restaurant_id = $restaurant_id;
	}

	public function setLivreurId($livreur_id)
	{
		$this->livreur_id = $livreur_id;
	}

	public function setNoConfirmation($no_confirmation)
	{
		$this->no_confirmation = $no_confirmation;
	}

	public function setDate($date)
	{
		$this->date = $date;
	}

	public function setTime($time)
	{
		$this->time = $time;
	}

	public function setState($state)
	{
		$this->state = $state;
	}

	public function setTotal($total)
	{
		$this->total = $total;
	}

	public static function getById($id)
	{
		$mysqli = Connection::getConnection();
		$sql_query = "SELECT * FROM orders WHERE id='$id'";
		$result = $mysqli->query($sql_query);
		$row = $result->fetch_array(MYSQLI_ASSOC);
		$order = new Order();
		$order->setId($row['id']);	
		$order->setClientId($row['client_id']);
		$order->setAddressId($row['address_id']);
		$order->setRestaurantId($row['restaurant_id']);
		$order->setNoConfirmation($row['no_confirmation']);
		$order->setDate($row['date']);
		$order->setTime($row['time']);
		$order->setState($row['state']);
		$order->setTotal($row['total']);
		Connection::disconnect();
		return $order;
	}

	public function addItems($platId, $quantity)
	{
		$item = new OrderItems();
		$item->setOrderId($this->id);
		$item->setPlatId($platId);
		$item->setQuantity($quantity);
		$item->save();
	}

	public function save()
	{
		$mysqli = Connection::getConnection();
		if(empty($this->id)) 
		{
			$query = "INSERT INTO orders (client_id, address_id, restaurant_id, livreur_id, no_confirmation, date, time, state, total) VALUES ('$this->client_id', '$this->address_id', '$this->restaurant_id', '$this->livreur_id', '$this->no_confirmation', '$this->date', '$this->time', '$this->state', '$this->total')";
			$result = $mysqli->query($query);
			$this->id=$mysqli->insert_id;
			return $result;
		}
		else 
		{
			$query = "UPDATE orders SET client_id='$this->client_id', address_id='$this->address_id',restaurant_id='$this->restaurant_id',livreur_id='$this->livreur_id',no_confirmation='$this->no_confirmation',date='$this->date',time='$this->time',state='$this->state',total_price='$this->total'  WHERE id='$this->id'";
			$result = $mysqli->query($query);
			return $result;
		}
		Connection::disconnect();
	}
}