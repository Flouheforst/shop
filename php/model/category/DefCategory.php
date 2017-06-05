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
			$this->db->query("INSERT into $this->tableName(name, approve) values(?s, 1)", $addCat);
		} 

		public function getAll(){
			return $result = $this->db->getAll("SELECT * FROM $this->tableName where approve = 1");
		}

		public function getName($id){
			return $this->db->getOne("SELECT name FROM $this->tableName where id = ?i", $id);  
		}

		public function delUnderOnDef($id){
			$id = intval($id);
			$res = $this->db->query("UPDATE shop.`def-category`
				SET approve = 0
				WHERE id = ?i", $id);

			return "success";
		}

	} 