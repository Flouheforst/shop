<?php 

	namespace php\model\provider;

	class Provider extends \php\model\Model {

		public function tableName(){
			return "provider";
		}

		public function fields(){
			return ["login", "password", "telephone", "address", "email", "approve", "photo", "full_name"];
		}

		public function addProvider($login, $passwordHash, $tel, $adres, $email, $uploadfile, $full_name){
			$approve = 0;

			return $this->db->query("INSERT into $this->tableName($this->fields) values(?s, ?s, ?s, ?s, ?s, ?i, ?s, ?s)", $login, $passwordHash, $tel, $adres, $email, $approve, $uploadfile, $full_name);
			
		}
		public function checkProvider($login, $password){
			$res = $this->db->getAll("SELECT id, telephone, email, photo, full_name, password, login, approve FROM $this->tableName");

			foreach ($res as $key => $value) {
				if ( password_verify($password, $value["password"]) && $login == $value["login"] && $value["approve"] == 0) {
					$result = $this->db->getAll("SELECT id, login, password, telephone, address, email, approve, photo, full_name, skills FROM $this->tableName where login = ?s ", $login);
					
					$_SESSION["dataProvider"] = $result;
					$_SESSION["auth-provider"] = true;
				} else {
					$_SESSION["auth-provider"] = false;
				} 
			}
		}
		public function getAll(){
			return $this->db->getAll("SELECT * from $this->tableName where approve = 0");
		}

		public function changeApprove($id, $approve){
			$this->db->query("UPDATE $this->tableName
				set approve = ?i
				where id = ?i", $approve, $id);
		}
	} 