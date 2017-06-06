<?php 

	namespace php\model\product;

	class Product extends \php\model\Model {

		public function tableName(){
			return "shop.Product";
		}

		public function fields(){
			return [ "price", "photo", "brand", "vendor_code", "dimensions", "mark_car", "description", "approve", "quantity", "name", "data"];
		}

		public function addProduct($price, $brand, $article, $deminsion, $mark, $quatity, $desciption, $product, $uploadfile, $name){
			$data = date('d.m.Y');
			$this->db->query("INSERT into $this->tableName($this->fields) values(?s, ?s, ?s, ?s, ?s, ?s, ?s, ?s, ?s, ?s , ?s)", $price, $uploadfile , $brand , $article , $deminsion , $mark , $desciption, $product, $quatity, $name, $data);
		}

		public function getId($price, $brand, $article){
			return $this->db->getOne("SELECT id FROM $this->tableName where price = ?s and brand= ?s and vendor_code = ?s", $price, $brand, $article);
		}

		public function getCount(){
			return $this->db->getAll("SELECT id, approve, COUNT(approve) FROM $this->tableName GROUP BY approve;");
		}

		public function getOnApprove($approve, $quantity){
			return $this->db->getAll("SELECT  $this->fields from $this->tableName where approve = ?s limit ?i", $approve, $quantity);
		}
		public function changeApprove($prdCat, $approve){
			foreach ($prdCat as $key => $value) {
				$res = $this->db->query("UPDATE shop.`product`
					SET approve = ?s
					WHERE id = ?i", $approve, $value);
			}
		}

		public function changeApprovePrd($prdCat, $approve){
			$prdCat = intval($prdCat);
			return $this->db->query("UPDATE shop.`product`
					SET approve = ?s
					WHERE id = ?i", $approve, $prdCat);
		}

		public function deleteOnId($id, $approve){
			$id = intval($id);
			$this->db->query("UPDATE $this->tableName
					SET approve = ?s
					where id = ?i", $approve, $id);
		}

		public function getIdOnArticul($article) {
			return $this->db->getOne("SELECT id from $this->tableName where vendor_code = ?s", $article);
		}


	} 