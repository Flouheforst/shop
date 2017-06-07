<?php 

	namespace php\model\client;

	class Client extends \php\model\Model {

		public function tableName(){
			return "shop.client";
		}

		public function fields(){
			return ["idclient", "email", "password", "full_name", "address", "date_birth", "date_regist", "approve", "telephone"];
		}

		public function addClient($email, $password, $fullname, $tel){
			$approve = 0;
			$data = date('d.m.Y');

			$res = $this->db->query("INSERT into $this->tableName(email, password, full_name, approve, telephone, date_regist) values(?s, ?s, ?s, ?i, ?s, ?s)", $email, $password, $fullname, $approve, $tel, $data);

			if ($res) {
				$result = $this->db->getAll("SELECT email, full_name, idclient FROM $this->tableName where email = ?s", $email);
				$_SESSION["auth"] = true;
				$_SESSION["dataUser"] = $result;
			} 
			return $res;
		}

		public function check($email, $password){

			$res = $this->db->getAll("SELECT $this->fields FROM $this->tableName");

			foreach ($res as $key => $value) {
				if ( password_verify($password, $value["password"]) && $email == $value["email"] && $value["approve"] == 0) {
					$result = $this->db->getAll("SELECT email, full_name, idclient, telephone FROM $this->tableName where email = ?s", $email);
					$_SESSION["dataUser"] = $result;
					$_SESSION["auth"] = true;
				} else {
					$_SESSION["auth"] = false;
				} 
			}
		}

		public function getCount(){
			return $this->db->getAll("select count(*) from $this->tableName");
		}

		public function getAllC(){
			return $this->db->getAll("select idclient, email, full_name, approve from $this->tableName where approve = 0");
		}

		public function changeApprove($id, $approve){
			$this->db->query("UPDATE $this->tableName
					SET approve = ?s
					where idclient = ?i", $approve, $id);
		}
	} 