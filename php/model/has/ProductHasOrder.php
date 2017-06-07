<?php 

	namespace php\model\has;

	class ProductHasOrder extends \php\model\Model {

		public function tableName(){
			return "shop.`product_has_order`";
		}

		public function fields(){
			return ["id", "Product_id", "order_idorder"];
		}

		public function add($idPrd, $idOrder){
			$idPrd = intval($idPrd);
			$idOrder = intval($idOrder);
			
			return $this->db->query("INSERT into $this->tableName(Product_id, order_idorder) values(?i, ?i)", $idPrd, $idOrder);

		}

	} 