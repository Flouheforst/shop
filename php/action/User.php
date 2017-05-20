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

		public function signIn(){
			if ( !empty($_POST["email"]) && !empty($_POST["password"]) ) {
				$email = $_POST["email"];
				$password = $_POST["password"];

				$client = new \php\model\client\Client();
				$client->check($email, $password);

				if ($_SESSION["auth"]) {
					\php\App::redirect("shop/");
				} else {
					\php\App::redirect("shop/signUser");
				} 
			}
		}
	} 