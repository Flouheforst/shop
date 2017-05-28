<?php 

	namespace php\model\product;

	class Product extends \php\model\Model {

		public function tableName(){
			return "shop.Product";
		}

		public function fields(){
			return ["id", "price", "photo", "brand", "vendor_code", "dimensions", "mark_car", "description", "approve", "quantity", "name", "data"];
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

		public function getOnApprove($approve){
			return $this->db->getAll("SELECT  $this->fields from $this->tableName where approve = ?s limit 4", $approve);
		}

		
	} 