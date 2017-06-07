<?php 

	namespace php\model\order;

	class Order extends \php\model\Model {

		public function tableName(){
			return "shop.`order`";
		}

		public function fields(){
			return ["date_order", "isApprove", "price", "payment_method", "quantity", "remoteness", "client_idclient", "place_id", "delivery_id", "delivery_place_id", "approveProduct"];
		}

		public function add($price, $quantity, $method, $userID, $remoteness, $approve, $approvePrd){
			$data = date('d.m.Y');

			return $this->db->query("INSERT into $this->tableName(date_order, isApprove, price, payment_method, quantity, remoteness, client_idclient, approveProduct) values(?s, ?i, ?s, ?s, ?s, ?s, ?s, ?s)", $data, $approve, $price, $method, $quantity, $remoteness, $userID, $approvePrd);

		}

		public function get($price, $quantity, $method, $userID, $remoteness){
			return $this->db->getOne("select id from $this->tableName where price = ?s and quantity = ?s and payment_method = ?s and client_idclient = ?s and remoteness = ?s ", $price, $quantity, $method, $userID, $remoteness);
		}

		public function getCunt($id){
			$_SESSION["user-orders"] = $this->db->getOne("select count(*) from $this->tableName where client_idclient = ?i", $id);
		}
	} 