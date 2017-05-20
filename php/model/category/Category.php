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

	} 