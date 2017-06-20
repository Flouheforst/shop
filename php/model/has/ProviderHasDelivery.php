<?php 

	namespace php\model\has;

	class ProviderHasDelivery extends \php\model\Model {

		public function tableName(){
			return "shop.`provider_has_delivery`";
		}

		public function fields(){
			return ["provider_id", "delivery_id"];
		}

		public function add($providerId, $deliveryId){
			
			$providerId = intval($providerId);
			$deliveryId = intval($deliveryId);
			
			return $this->db->query("INSERT into $this->tableName(provider_id, delivery_id) values(?i, ?i)", $providerId, $deliveryId);

		}

	} 