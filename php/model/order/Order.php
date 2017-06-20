<?php 

	namespace php\model\order;

	class Order extends \php\model\Model {

		public function tableName(){
			return "shop.`order`";
		}

		public function fields(){
			return ["date_order", "isApprove", "price", "payment_method", "quantity", "remoteness", "client_idclient", "place_id", "delivery_id", "delivery_place_id", "approveProduct", "amount"];
		}

		public function add($price, $quantity, $method, $userID, $remoteness, $approve, $approvePrd, $amount){
			$data = date('d.m.Y');

			return $this->db->query("INSERT into $this->tableName(date_order, isApprove, price, payment_method, quantity, remoteness, client_idclient, approveProduct, amount) values(?s, ?i, ?s, ?s, ?s, ?s, ?s, ?s, ?i)", $data, $approve, $price, $method, $quantity, $remoteness, $userID, $approvePrd, $amount);

		}

		public function get($price, $quantity, $method, $userID, $remoteness){
			return $this->db->getAll("select id from $this->tableName where price = ?s and quantity = ?s and payment_method = ?s and client_idclient = ?s and remoteness = ?s ", $price, $quantity, $method, $userID, $remoteness);
		}

		public function getCunt($id){
			unset($_SESSION["user-orders"]);
			$_SESSION["user-orders"] = $this->db->getOne("SELECT count(*) from $this->tableName where client_idclient = ?i  and isApprove != 2 and isApprove != 3 and isApprove != 4", $id);
		}

		public function getOnId($id){
			$id = intval($id);
			return $this->db->getAll("SELECT id, date_order, price, payment_method, quantity, remoteness, amount from $this->tableName where client_idclient = ?i  and isApprove != 2 and isApprove != 3 and isApprove != 4", $id);
		}

		public function changeApprove($id, $approve){
			$id = intval($id);
			$this->db->query("UPDATE shop.`order` 
				set isApprove = ?i
				where id = ?i", $approve, $id);
		}

		public function getAll(){
			return $this->db->getAll("select * from $this->tableName where isApprove = 1");
		}

		public function getOnApprove(){
			return $this->db->getAll("select * from $this->tableName where isApprove = 0");
		}

		public function getQuantity($id){
			return $this->db->getOne("select quantity from $this->tableName where id = ?s", $id);
		}

		public function getClientId($allOrder){
			$clientId = [];

			foreach ($allOrder as $key => $value) {
				$clientId[$key] = $this->db->getOne("SELECT client_idclient FROM $this->tableName where id = ?s", $value["id"]);
			}

			return $clientId;
		}

		public function setDeliveryId($idDelivery, $orderid){
			$idDelivery = intval($idDelivery);
			$orderid = intval($orderid);

			$this->db->query("UPDATE $this->tableName
					SET delivery_id = ?i
					WHERE id = ?i", $idDelivery, $orderid);
		}
	} 