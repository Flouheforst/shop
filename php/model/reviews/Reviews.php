<?php 

	namespace php\model\reviews;

	class Reviews extends \php\model\Model {

		public function tableName(){
			return "shop.reviews";
		}

		public function fields(){
			return ["text", "author", "approve", "Product_id", "data"];
		}

		public function add($text, $author, $approve, $PrdId){
			$PrdId = intval($PrdId);
			$data = date('d.m.Y');
			$this->db->query("INSERT into $this->tableName($this->fields) values(?s, ?s, ?i, ?i, ?s)", $text, $author, $approve, $PrdId, $data);
		}

		public function getOnPrd($id){
			return $this->db->getAll("SELECT * from $this->tableName where Product_id = ?i", $id);
		}

		public function getCol(){
			return $this->db->getOne("SELECT COUNT(*) FROM $this->tableName where approve = 0");
		}

		public function getAll(){
			 return $this->db->getAll("SELECT * from $this->tableName where approve = 0");
		}

		public function search($query){
			return $this->db->getAll("SELECT * FROM shop.reviews where approve = 0 and id  like ?s or author like ?s", "%" . $query . "%", "%" . $query . "%" );
		}

		public function changeApprove($id, $approve){
			return $this->db->query("
					UPDATE $this->tableName
					set approve = ?s
					WHERE id = ?s", $approve, $id);
		}

	} 