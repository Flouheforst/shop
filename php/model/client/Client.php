<?php 

	namespace php\model\client;

	class Client extends \php\model\Model {

		public function tableName(){
			return "shop.client";
		}

		public function fields(){
			return ["idclient", "email", "password", "full_name", "address", "date_birth", "date_regist", "approve"];
		}

		public function addClient($email, $password, $fullname){
			$approve = 0;

			$res = $this->db->query("INSERT into $this->tableName(email, password, full_name, approve) values(?s, ?s, ?s, ?i)", $email, $password, $fullname, $approve);

			if ($res) {
				$result = $this->db->getAll("SELECT email, full_name, idclient FROM $this->tableName where email = ?s", $email);
				$_SESSION["auth"] = true;
				$_SESSION["data-user"] = $result;
			} 
			return $res;
		}

		public function check($email, $password){

			$res = $this->db->getAll("SELECT $this->fields FROM $this->tableName");

			foreach ($res as $key => $value) {
				if ( password_verify($password, $value["password"]) && $email == $value["email"]) {
					$_SESSION["auth"] = true;
				} else {
					$_SESSION["auth"] = false;
				} 
			}
		}
	} 