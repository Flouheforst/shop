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
			$this->db->query("INSERT into $this->tableName(def_category_id, name, approve) values(?s, ?s, 1)", $id, $underCat);
		} 

		public function getAll(){
			return $result = $this->db->getAll("SELECT * FROM $this->tableName where approve = 1");
		}

		public function getDefCategoryId($categoty) {
			return $this->db->getOne("SELECT def_category_id FROM $this->tableName where name = ?s", $categoty);  
		} 

		public function delUnderOnDef($id){
			$id = intval($id);
			$this->db->query("UPDATE shop.`under-categor`
				SET approve = 0
				WHERE def_category_id = ?i", $id);

			return "success";
		}

		public function delUnder($id){
			$id = intval($id);
			$res = $this->db->query("UPDATE shop.`under-categor`
				SET approve = 0
				WHERE id = ?i", $id);
			return $res;
		}

		public function getName($id){
			$id = intval($id);
			return $this->db->getOne("select name from $this->tableName where id = ?i", $id);
		}
	} 