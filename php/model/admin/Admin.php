<?php 

	namespace php\model\admin;

	class Admin extends \php\model\Model {

		public function tableName(){
			return "shop.`admin`";
		}

		public function fields(){
			return ["id", "login", "password"];
		} 

		public function checkAdmin($login, $password){
			$result = $this->db->getAll("SELECT $this->fields FROM $this->tableName");

			foreach ($result as $key => $value) {
				if (password_verify($password, $value["password"]) && $login === $value["login"]) {
				    $_SESSION["admin-auth"] = true;
				} else {
				    $_SESSION["admin-auth"] = false;
				}
			}
		}

		
	} 