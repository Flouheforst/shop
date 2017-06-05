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

		public function feedBack(){
			if ( !empty($_POST["text"])) {
				$text = $_POST["text"];
				$data = date('d.m.Y');
				$user = $_SESSION["dataUser"][0]["email"];
				

				$feed = new \php\model\feadback\Feedback();
				$res = $feed->addFeedBack($text, $data, $user);
				
				if ($res) {
					\php\App::redirect("shop/");
				} else {
					\php\App::redirect("shop/feedback");
				} 
			} else {
				\php\App::redirect("shop/feedback");
			}
		}

		
	} 