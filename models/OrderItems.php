<?php
/**
* Order Details
*/
class OrderItems
{
	public $id;
	public $order_id;
	public $plat_id;
	public $quantity;
	
	function __construct() {}

	public function setId($id)
	{
		$this->id=$id;
	}
	public function setOrderId($id)
	{
		$this->order_id=$id;
	}
	public function setPlatId($id)
	{
		$this->plat_id = $id;
	}
	public function setQuantity($qte)
	{
		$this->quantity = $qte;
	}

	public function save()
	{
		$mysqli = Connection::getConnection();
		if(empty($this->id)) 
		{
			$query = "INSERT INTO order_items (order_id, plat_id, quantity) VALUES ('$this->order_id', '$this->plat_id', '$this->quantity')";
			$result = $mysqli->query($query);
			$this->id=$mysqli->insert_id;
			return $result;
		}
		else 
		{
			$query = "UPDATE order_items SET order_id='$this->order_id', plat_id='$this->plat_id',quantity='$this->quantity' WHERE id='$this->id'";
			$result = $mysqli->query($query);
			return $result;
		}
		Connection::disconnect();		
	}
}