<?php 

	namespace php\model\delivery;

	class Delivery extends \php\model\Model {

		public function tableName(){
			return "delivery";
		}

		public function fields(){
			return ["id", "date-delivery", "price-delivery", "approve"];
		}

		public function add($price, $approve){
			$this->db->query("INSERT into $this->tableName(`price-delivery`, approve) values(?s, ?s)", $price, $approve);
			return $this->db->getOne("SELECT LAST_INSERT_ID()");
		}			
	}  