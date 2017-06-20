<?php 

	namespace php\model\join;

	class ProductOrder{

		public function __construct(){
			$this->db = \php\model\Db::getInstance()->db;
		}
		
	
		public function getProductId($orderOnId){
			$prdId = [];
			foreach ($orderOnId as $key => $value) {
				$prdId[$key] = $this->db->getOne("SELECT Product_id FROM shop.product_has_order where order_idorder = ?s", $value["id"]);
			}

			return $prdId;
		}

		public function getPrdId($orderOnId){
			return $this->db->getOne("SELECT Product_id FROM shop.product_has_order where order_idorder = ?s", $orderOnId);
		}
	} 