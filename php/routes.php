<?php 
	
	$router->get("/", function(){
		echo "qwe";
	});

	$router->get("/signAdmin", function(){
		\php\App::renderPages("signAdmin");
	});

	$router->get("/sign", function(){
		if ( !empty($_POST["login"]) && !empty($_POST["password"]) ) {
			$login = $_POST["login"];
			$password = $_POST["password"];

			$admin = new \php\model\admin\Admin();
			$admin->checkAdmin($login, $password);

			if ($_SESSION["admin-auth"]) {
				\php\App::redirect("shop/admin");
			} else {
				\php\FlashPush::add("admin-auth", "Неправильный логин/пароль");
				\php\App::redirect("shop/signAdmin");
			} 
		}
	});

	$router->get("/admin", function(){
		if ($_SESSION["admin-auth"]) {
			$defCat = new \php\model\category\DefCategory();
			$defUnderCat = new \php\model\category\UnderCat();

			$resCat = $defCat->getAll();
			$resUnder = $defUnderCat->getAll();

			$productCategory = new \php\model\join\ProductCategory();
			$prdCat = $productCategory->getPrdCat();
			
			$product = new \php\model\product\Product();
			$countPrd = $product->getCount();

			php\App::renderPages("admin", [
					"defTag" => $resCat,
					"underCat" => $resUnder,
					"prdCat" => $prdCat,
					"countPrd" => $countPrd
				]);
		} else {
			\php\App::redirect("shop/signAdmin");
		}
	});

	$router->post("/addCat", function(){
		if ($_SESSION["admin-auth"]) {
			$cat = $_POST["cat"];

			$defCat = new \php\model\category\DefCategory();
			$defCat->addCat($cat);
		} else {
			\php\App::redirect("shop/signAdmin");
		}
	});

	$router->post("/addProduct", "Admin:addProduct");

	$router->post("/addUnderCat", function(){
		if ($_SESSION["admin-auth"]) {
			$id = $_POST["id"];
			$underCat = $_POST["underCat"];
			$defUnderCat = new \php\model\category\UnderCat();
			$defUnderCat->addUnderCat($id, $underCat);
		} else {
			\php\App::redirect("shop/signAdmin");
		} 
	});

	$router->get("/adminLogout", function(){
		unset($_SESSION["admin-auth"]);
		\php\App::redirect("shop/signAdmin");
	});

	$router->get("/regUser", function (){
		\php\App::renderPages("registration");
	});

	$router->post("/registration", "User:registration");

	$router->get("/signUser", function (){
		echo "signUser";
	});

	$router->get("/providerSign", function(){
		echo "providerSign";
	});

	$router->get("/provider", function(){
		echo "provider";
	});

	$router->get("/userSettings", function(){

	});

	$router->get("/userLogout", function(){

	});