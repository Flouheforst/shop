<?php 

	namespace php\action;

	class Provider {
		public function signProvider(){
			if ( !empty($_POST["login"]) && !empty($_POST["password"]) ) {
				$login = $_POST["login"];
				$password = $_POST["password"];

				$provider = new \php\model\provider\Provider();
				$provider->checkProvider($login, $password);
				if ($_SESSION["auth-provider"]) {
					\php\App::redirect("shop/provider");
				} else {
					\php\App::redirect("shop/providerSign");
				}
			}
		}		
	} 