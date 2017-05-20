<?php 

	namespace php\action;

	class User {
		public function registration(){
			if ( !empty($_POST["email"]) && !empty($_POST["password"]) && !empty($_POST["fullname"]) ) {
				$email = $_POST["email"];
				$password = $_POST["password"];
				$fullname = $_POST["fullname"];
				$passwordHash = password_hash($password, PASSWORD_DEFAULT);
				
				$client = new \php\model\client\Client();
				$res = $client->addClient($email, $passwordHash, $fullname);
				
				if ($res) {
					\php\App::redirect("shop/");
				}
			} else {
				\php\App::redirect("shop/regUser");
			}
		}
	} 