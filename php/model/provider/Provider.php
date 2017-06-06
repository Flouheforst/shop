<?php 

	namespace php\model\provider;

	class Provider extends \php\model\Model {

		public function tableName(){
			return "provider";
		}

		public function fields(){
			return ["login", "password", "telephone", "address", "email", "approve", "photo"];
		}

		public function addProvider($login, $passwordHash, $tel, $adres, $email, $uploadfile){
			$approve = 0;

			return $this->db->query("INSERT into $this->tableName($this->fields) values(?s, ?s, ?s, ?s, ?s, ?i, ?s)", $login, $passwordHash, $tel, $adres, $email, $approve, $uploadfile);
			
		}
	} 