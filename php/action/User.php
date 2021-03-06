<?php 

	namespace php\action;

	class User {
		public function registration(){
			if ( !empty($_POST["email"]) && !empty($_POST["password"]) && !empty($_POST["fullname"]) && !empty($_POST["tel"]) ) {
				$email = $_POST["email"];
				$password = $_POST["password"];
				$fullname = $_POST["fullname"];
				$tel = $_POST["tel"];
				$passwordHash = password_hash($password, PASSWORD_DEFAULT);
				
				$client = new \php\model\client\Client();
				$res = $client->addClient($email, $passwordHash, $fullname, $tel);
				
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

		public function addBasketPrd(){
			
			if (!empty($_POST["id"]) && !empty($_POST["quantity"]) && !empty($_POST["method"]) && !empty($_POST["price"])  && !empty($_POST["remoteness"]) ) {
				if ( intval($_POST["quantity"]) == $_POST["quantity"] && $_POST["quantity"] > 0) {

					$idPrd = $_POST["id"];
					$price = $_POST["price"];
					$quantity = $_POST["quantity"];
					$method = $_POST["method"];
					$remoteness = $_POST["remoteness"];

					$quantity = intval($quantity);

					$product = new \php\model\product\Product();
					$quantityPrd = $product->getQuantity($idPrd);
					$approvePrd = $product->getApprove($idPrd);

					if ( ($quantityPrd - $quantity) >= 0 ) {
						$order = new \php\model\order\Order();
						$amount = $price * $quantity;
						$amount = intval($amount);
						if ($method === "Доставка курьером") {
							$approve = 0;
							$resOrder = $order->add($price, $quantity, $method, $_SESSION["dataUser"][0]["idclient"], $remoteness, $approve, $approvePrd, $amount);
						} elseif ($method === "Покупка в ближайшем магазине") {
							$approve = 1;
							$resOrder = $order->add($price, $quantity, $method, $_SESSION["dataUser"][0]["idclient"], $remoteness, $approve, $approvePrd, $amount);
						}
						
						$idOrder = $order->get($price, $quantity, $method, $_SESSION["dataUser"][0]["idclient"], $remoteness);

						$idOrder = array_pop($idOrder);
						if ($resOrder) {
							$prdHasOrder = new \php\model\has\ProductHasOrder();
							$res = $prdHasOrder->add($idPrd, $idOrder["id"]);
							$product->multipay($idPrd, $quantity);
							if ($res) {
								\php\App::redirect("shop/");
							}
						}
					} else {
						\php\App::redirect("shop/");
						\php\FlashPush::add("quntity-basket", "Такого количества товара нету на складе");
					}
				} else {
					\php\FlashPush::add("quntity-basket", "В поле количество нельзя указывать буквы");
					\php\App::redirect("shop/");
				}
			} else {
				\php\App::redirect("shop/");
				\php\FlashPush::add("basket", "Вы заполнили не все поля");

			}
		}

	} 