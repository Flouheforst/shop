<?php 

	namespace php\model\feadback;

	class Feedback extends \php\model\Model {

		public function tableName(){
			return "feadback";
		}

		public function fields(){
			return ["id", "date", "author", "text"];
		}

		public function addFeedBack($text, $data, $user){
			return $this->db->query("INSERT into $this->tableName(date, author, text) values(?s, ?s, ?s)", $data, $user, $text);
		}

		public function getFeedBack(){
			return $this->db->getAll("SELECT $this->fields from $this->tableName");
		}
		
		public function getAllF(){
			return $this->db->getAll("SELECT * from $this->tableName");
		}
	} 