<?php 

	namespace php\model\category;

	class UnderCat extends \php\model\Model {

		public function tableName(){
			return "shop.`under-categor`";
		}

		public function fields(){
			return ["id", "def_category_id", "name"];
		}

		public function addUnderCat($id, $underCat){
			$this->db->query("INSERT into $this->tableName(def_category_id, name) values(?s, ?s)", $id, $underCat);
		} 

		public function getAll(){
			return $result = $this->db->getAll("SELECT * FROM $this->tableName");
		}

		public function getDefCategoryId($categoty) {
			return $this->db->getOne("SELECT def_category_id FROM $this->tableName where name = ?s", $categoty);  
		} 
	} 