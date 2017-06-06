<?php 

	namespace php\model\category;

	class Category extends \php\model\Model {

		public function tableName(){
			return "shop.`category`";
		}

		public function fields(){
			return ["id", "name_def", "name_under"];
		}

		public function addCategory($nameCat, $categotyUnder){
			$this->db->query("INSERT into $this->tableName(name_def, name_under) values(?s, ?s)", $nameCat, $categotyUnder);
		}

		public function getId($nameCat, $categotyUnder){
			$res = $this->db->getAll("SELECT * FROM $this->tableName");
			return array_pop($res);
		}

		public function getOnApprove($nameCat){
			return $this->db->getAll("select * from $this->tableName where name_def = ?s", $nameCat);
		}

		public function getOnAprUnder($nameCat){
			return $this->db->getAll("select * from $this->tableName where name_under = ?s", $nameCat);
		}

		public function updateUnder($catId, $underCat, $nameDef){
			$catId = intval($catId);
			return $this->db->query("UPDATE $this->tableName
					SET name_under = ?s, name_def = ?s
					where id = ?i", $underCat, $nameDef, $catId);
		}
	} 