<?php 

	namespace php\model\category;

	class DefCategory extends \php\model\Model {

		public function tableName(){
			return "shop.`def-category`";
		}

		public function fields(){
			return ["id", "name", "approve"];
		}

		public function addCat($addCat){
			$this->db->query("INSERT into $this->tableName(name) values(?s)", $addCat);
		} 

		public function getAll(){
			return $result = $this->db->getAll("SELECT * FROM $this->tableName");
		}

		public function getName($id){
			return $this->db->getOne("SELECT name FROM $this->tableName where id = ?i", $id);  
		}
	} 