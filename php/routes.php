<?php 
	
	$router->get("/", function(){

		$defCat = new \php\model\category\DefCategory();
		$defUnderCat = new \php\model\category\UnderCat();

		$product = new \php\model\product\Product();
		$productCategory = new \php\model\join\ProductCategory();

		$order = new \php\model\order\Order();
		if (isset($_SESSION["dataUser"])) {
			$order->getCunt($_SESSION["dataUser"][0]["idclient"]);
		}

		$prdCat = $productCategory->getPrdCat();
		$resCat = $defCat->getAll();
		$resUnder = $defUnderCat->getAll();
		$hitPrd = $product->getOnApprove("Хит продаж ", 4);
		$stock = $product->getOnApprove("Акция", 4);
		$newOne = $product->getOnApprove("Новинка", 1);
		$newTwo = $product->getOnApprove("Новинка", 2);

		

		$new = [
			"newOne" => $newOne,
			"newTwo" => $newTwo
		];

		\php\App::renderPages("main", [
				"prdCat" => $prdCat,
				"resCat" => $resCat,
				"resUnder" => $resUnder,
				"hitPrd" => $hitPrd,
				"stock" => $stock,
				"new" => $new,
				
			]);

	});

	$router->get("/basket", function(){
		if ($_SESSION["auth"]) {
			$product = new \php\model\product\Product();
			$order = new \php\model\order\Order();
			$prdOrder = new \php\model\join\ProductOrder();

			$orderOnId = $order->getOnId($_SESSION["dataUser"][0]["idclient"]);
			$onPrdOrder = $prdOrder->getProductId($orderOnId);
			$order->getCunt($_SESSION["dataUser"][0]["idclient"]);
			$newOne = $product->getOnApprove("Новинка", 1);
			$newTwo = $product->getOnApprove("Новинка", 2);
			$defCat = new \php\model\category\DefCategory();
			$defUnderCat = new \php\model\category\UnderCat();
			$resCat = $defCat->getAll();
			$resUnder = $defUnderCat->getAll();

			$new = [
				"newOne" => $newOne,
				"newTwo" => $newTwo
			];

			$onIdProduct = $product->getOnIdHas($onPrdOrder);

			if ( !empty($orderOnId) && !empty($onIdProduct) ) {
				foreach ($orderOnId as $key => $value) {
					$basket[$key] = array_merge($orderOnId[$key], $onIdProduct[$key]);
				}
				\php\App::renderPages("basket", [
					"resCat" => $resCat,
					"resUnder" => $resUnder,
					"new" => $new,
					"basket" => $basket
				]);
			} else {
				\php\App::renderPages("basket", [
					"resCat" => $resCat,
					"resUnder" => $resUnder,
					"new" => $new
				]);
			}
		
		}
	});

	$router->post("/removeBaset", function(){
		if ($_SESSION["admin-auth"]) {
			$id = $_POST["id"];
			$order = new \php\model\order\Order();
			$order->changeApprove($id, 2);
		}
	});

	$router->post("/backProduct", function(){
		if ($_SESSION["admin-auth"]) {
			$id = $_POST["id"];
			$order = new \php\model\order\Order();
			$prdOrder = new \php\model\join\ProductOrder();
			$product = new \php\model\product\Product();
			$quantity = $order->getQuantity($id);
			$order->changeApprove($id, 3);
			$idPrd = $prdOrder->getPrdId($id);
			
			$product->updateQuantiy($idPrd, $quantity);

		}
	});

	$router->post("/search", function(){
		$valueSearch = $_POST["search"];
		if (!empty($valueSearch)) {
			$productCat = new \php\model\join\ProductCategory();
			$product = new \php\model\product\Product();
			$defCat = new \php\model\category\DefCategory();
			$defUnderCat = new \php\model\category\UnderCat();
			$order = new \php\model\order\Order();

			$order->getCunt($_SESSION["dataUser"][0]["idclient"]);
			$hitPrd = $product->getOnApprove("Хит продаж ", 4);
			$stock = $product->getOnApprove("Акция", 4);
			$newOne = $product->getOnApprove("Новинка", 1);
			$newTwo = $product->getOnApprove("Новинка", 2);
			$resCat = $defCat->getAll();
			$resUnder = $defUnderCat->getAll();
			$res = $productCat->find($valueSearch);

			$new = [
				"newOne" => $newOne,
				"newTwo" => $newTwo
			];


			\php\App::renderPages("search", [
					"res" => $res,
					"hitPrd" => $hitPrd,
					"stock" => $stock,
					"new" => $new,
					"resCat" => $resCat,
					"resUnder" => $resUnder
				]);
		} else {
			\php\FlashPush::add("search-empty", "Вы не ввели артикул или название товара");
			\php\App::redirect("shop/");
		}

	});

	$router->get("/all-Product", function(){
		
		$product = new \php\model\product\Product();
		$defCat = new \php\model\category\DefCategory();
		$defUnderCat = new \php\model\category\UnderCat();
		$order = new \php\model\order\Order();
		$productCategory = new \php\model\join\ProductCategory();
		
		$prdCat = $productCategory->getPrdCatNotDel();
		$order->getCunt($_SESSION["dataUser"][0]["idclient"]);
		$hitPrd = $product->getOnApprove("Хит продаж ", 4);
		$stock = $product->getOnApprove("Акция", 4);
		$newOne = $product->getOnApprove("Новинка", 1);
		$newTwo = $product->getOnApprove("Новинка", 2);
		$resCat = $defCat->getAll();
		$resUnder = $defUnderCat->getAll();

		$new = [
			"newOne" => $newOne,
			"newTwo" => $newTwo
			
		];

		\php\App::renderPages("all-product",[
				"hitPrd" => $hitPrd,
				"new" => $new,
				"resCat" => $resCat,
				"resUnder" => $resUnder,
				"prdCat" => $prdCat
			]);
	});

	$router->post("/changeUnder", function(){
		if ($_SESSION["admin-auth"]) {
			$articul = $_POST["articul"];
			$underCat = $_POST["underCat"];

			$product = new \php\model\product\Product();
			$idPrd = $product->getIdOnArticul($articul);

			$prdHasCat = new \php\model\has\ProductHasCategory();
			$catId = $prdHasCat->getOnPrdId($idPrd);

			$defCat = new \php\model\category\DefCategory();
			$defUnderCat = new \php\model\category\UnderCat();

			$defCategoryId = $defUnderCat->getDefCategoryId($underCat);
			$nameDef = $defCat->getName($defCategoryId);

			$category = new \php\model\category\Category();
			$res = $category->updateUnder($catId, $underCat, $nameDef);

			echo $res;

		}
	});

	$router->post("/changeApprovePrd", function(){
		$id = $_POST["id"];
		$approve = $_POST["approve"];

		$product = new \php\model\product\Product();
		$res = $product->changeApprovePrd($id, $approve);

		if ($res) {
			echo "ok";
		} else {
			echo "nope";
		}
	});

	$router->post("/addReviews", function(){
		if (isset($_SESSION["auth"])) {
			$text = $_POST["text"];
			$id = $_POST["idPrd"];
			$author = $_SESSION["dataUser"][0]["email"];

			$review = new \php\model\reviews\Reviews();
			$review->add($text, $author, 0, $id);

			\php\App::redirect("shop/");
		} else {
			\php\App::redirect("shop/");
		}
	});

	$router->post("/addKur", function(){
		if ($_SESSION["admin-auth"]) {
			$login = $_POST["login"];
			$pass = $_POST["pass"];
			$tel = $_POST["tel"];
			$adres = $_POST["adres"];
			$fullName = $_POST["fullName"];
			$email = $_POST["email"];

			$uploaddir = "assets/image/kurier/";
			$uploadfile = $uploaddir . $_FILES['photo']['name'];

			if (move_uploaded_file($_FILES['photo']['tmp_name'], $uploadfile)) {
				$passwordHash = password_hash($pass, PASSWORD_DEFAULT);

				$provider = new \php\model\provider\Provider();
				$res = $provider->addProvider($login, $passwordHash, $tel, $adres, $email, $uploadfile, $fullName);
			}
			

			if ($res) {
				\php\App::redirect("shop/admin");
			}
		}
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

	$router->post("/delUser" , function(){
		if ($_SESSION["admin-auth"]) {
			$idClient = $_POST['idClient'];
			$client = new \php\model\client\Client();
			$client->changeApprove($idClient, 1);

			

		}
	});

	$router->post("/excelUser", function()  use ($xls){
		$client = new \php\model\client\Client();
		$allClient = $client->getAllC();


		$feedback = new \php\model\feadback\Feedback();
			$resFeed = $feedback->getAllF();

			// Устанавливаем индекс активного листа
			$xls->setActiveSheetIndex(0);
			// Получаем активный лист
			$sheet = $xls->getActiveSheet();
			// Подписываем лист
			$sheet->setTitle('Пользователи');

			// Вставляем текст в ячейку A1
			$sheet->setCellValue("A1", 'Пользователи');
			$sheet->getStyle('A1')->getFill()->setFillType(
			    PHPExcel_Style_Fill::FILL_SOLID);
			$sheet->getStyle('A1')->getFill()->getStartColor()->setRGB('EEEEEE');

			// Объединяем ячейки
			$sheet->mergeCells('A1:H1');

			// Выравнивание текста
			$sheet->getStyle('A1')->getAlignment()->setHorizontal(
			    PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			
			
			$sheet->getColumnDimension('A')->setWidth(20);
			$sheet->getColumnDimension('B')->setWidth(20);
			$sheet->getColumnDimension('C')->setWidth(20);
			$sheet->getColumnDimension('D')->setWidth(20);
			$sheet->getColumnDimension('E')->setWidth(20);
			$sheet->getColumnDimension('F')->setWidth(20);
			$sheet->getColumnDimension('G')->setWidth(20);
			$sheet->getColumnDimension('H')->setWidth(20);

			$i = 3;
			$j = 0;
			foreach ($allClient as $key => $value) {
				if($value["approve"] == 0) {
					$sheet->setCellValueByColumnAndRow($j, $i, $value["idclient"]);
					$sheet->setCellValueByColumnAndRow($j, $i + 1, $value["email"]);
					$sheet->setCellValueByColumnAndRow($j, $i + 2, $value["full_name"]);

					// Применяем выравнивание
					$sheet->getStyleByColumnAndRow($i, $j)->getAlignment()->
			           setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

			           $j++;
				}
			}

			header ( "Expires: Mon, 1 Apr 1974 05:00:00 GMT" );
			header ( "Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT" );
			header ( "Cache-Control: no-cache, must-revalidate" );
			header ( "Pragma: no-cache" );
			header ( "Content-type: application/vnd.ms-excel charset=utf-8" );
			header ( "Content-Disposition: attachment; filename=Users.xls" );

			$objWriter = new PHPExcel_Writer_Excel5($xls);
			$objWriter->save('php://output');


	});

	$router->post("/excelFeedback", function() use ($xls){
			$feedback = new \php\model\feadback\Feedback();
			$resFeed = $feedback->getAllF();

			// Устанавливаем индекс активного листа
			$xls->setActiveSheetIndex(0);
			// Получаем активный лист
			$sheet = $xls->getActiveSheet();
			// Подписываем лист
			$sheet->setTitle('Обратная связь');

			// Вставляем текст в ячейку A1
			$sheet->setCellValue("A1", 'Обратная связь');
			$sheet->getStyle('A1')->getFill()->setFillType(
			    PHPExcel_Style_Fill::FILL_SOLID);
			$sheet->getStyle('A1')->getFill()->getStartColor()->setRGB('EEEEEE');

			// Объединяем ячейки
			$sheet->mergeCells('A1:H1');

			// Выравнивание текста
			$sheet->getStyle('A1')->getAlignment()->setHorizontal(
			    PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			
			
			$sheet->getColumnDimension('A')->setWidth(20);
			$sheet->getColumnDimension('B')->setWidth(20);
			$sheet->getColumnDimension('C')->setWidth(20);
			$sheet->getColumnDimension('D')->setWidth(20);
			$sheet->getColumnDimension('E')->setWidth(20);
			$sheet->getColumnDimension('F')->setWidth(20);
			$sheet->getColumnDimension('G')->setWidth(20);
			$sheet->getColumnDimension('H')->setWidth(20);

			$i = 3;
			$j = 0;
			foreach ($resFeed as $key => $value) {
				$sheet->setCellValueByColumnAndRow($j, $i, $value["id"]);
				$sheet->setCellValueByColumnAndRow($j, $i + 1, $value["date"]);
				$sheet->setCellValueByColumnAndRow($j, $i + 2, $value["author"]);
				$sheet->setCellValueByColumnAndRow($j, $i + 3, $value["text"]);

				// Применяем выравнивание
				$sheet->getStyleByColumnAndRow($i, $j)->getAlignment()->
			           setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

			           $j++;
			}

			header ( "Expires: Mon, 1 Apr 1974 05:00:00 GMT" );
			header ( "Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT" );
			header ( "Cache-Control: no-cache, must-revalidate" );
			header ( "Pragma: no-cache" );
			header ( "Content-type: application/vnd.ms-excel charset=utf-8" );
			header ( "Content-Disposition: attachment; filename=Feadback.xls" );

			$objWriter = new PHPExcel_Writer_Excel5($xls);
			$objWriter->save('php://output');

	});

	$router->post("/excelBasket", function() use ($xls) {
		$order = new \php\model\order\Order();
		$orderOnId = $order->getOnId($_SESSION["dataUser"][0]["idclient"]);

		// Устанавливаем индекс активного листа
		$xls->setActiveSheetIndex(0);
		// Получаем активный лист
		$sheet = $xls->getActiveSheet();
		// Подписываем лист
		$sheet->setTitle('Корзина');

		// Вставляем текст в ячейку A1
		$sheet->setCellValue("A1", 'Корзина');
		$sheet->getStyle('A1')->getFill()->setFillType(
		    PHPExcel_Style_Fill::FILL_SOLID);
		$sheet->getStyle('A1')->getFill()->getStartColor()->setRGB('EEEEEE');

		// Объединяем ячейки
		$sheet->mergeCells('A1:H1');

		// Выравнивание текста
		$sheet->getStyle('A1')->getAlignment()->setHorizontal(
		    PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		
		
		$sheet->getColumnDimension('A')->setWidth(20);
		$sheet->getColumnDimension('B')->setWidth(20);
		$sheet->getColumnDimension('C')->setWidth(20);
		$sheet->getColumnDimension('D')->setWidth(20);
		$sheet->getColumnDimension('E')->setWidth(20);
		$sheet->getColumnDimension('F')->setWidth(20);
		$sheet->getColumnDimension('G')->setWidth(20);
		$sheet->getColumnDimension('H')->setWidth(20);

		$i = 3;
		$j = 0;
		foreach ($orderOnId as $key => $value) {
			$sheet->setCellValueByColumnAndRow($j, $i, $value["id"]);
			$sheet->setCellValueByColumnAndRow($j, $i + 1, $value["date_order"]);
			$sheet->setCellValueByColumnAndRow($j, $i + 2, $value["price"]);
			$sheet->setCellValueByColumnAndRow($j, $i + 3, $value["payment_method"]);
			$sheet->setCellValueByColumnAndRow($j, $i + 4, $value["quantity"]);
			$sheet->setCellValueByColumnAndRow($j, $i + 5, $value["remoteness"]);
			$sheet->setCellValueByColumnAndRow($j, $i + 6, $value["amount"]);

			// Применяем выравнивание
			$sheet->getStyleByColumnAndRow($i, $j)->getAlignment()->
		           setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

		           $j++;
		}

		header ( "Expires: Mon, 1 Apr 1974 05:00:00 GMT" );
		header ( "Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT" );
		header ( "Cache-Control: no-cache, must-revalidate" );
		header ( "Pragma: no-cache" );
		header ( "Content-type: application/vnd.ms-excel charset=utf-8" );
		header ( "Content-Disposition: attachment; filename=Basket.xls" );

		$objWriter = new PHPExcel_Writer_Excel5($xls);
		$objWriter->save('php://output');


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

			$client = new \php\model\client\Client();
			$countClient = $client->getCount();
			$allClient = $client->getAllC();

			$feedback = new \php\model\feadback\Feedback();
			$resFeed = $feedback->getAllF();

			$provider = new \php\model\provider\Provider();
			$allProvider = $provider->getAll();

			$order = new \php\model\order\Order();
			$allOrder = $order->getAll();

			$prdOrder = new \php\model\join\ProductOrder();
			$onPrdOrder = $prdOrder->getProductId($allOrder);

			$onIdProduct = $product->getOnIdHas($onPrdOrder);

			$review = new \php\model\reviews\Reviews();
			$countReview = $review->getCol();
			$allReview = $review->getAll();

			if (!empty($allOrder) && !empty($onIdProduct)) {
				foreach ($allOrder as $key => $value) {
					$allprdOrder[$key] = array_merge($allOrder[$key], $onIdProduct[$key]);
				}
				php\App::renderPages("admin", [
					"defTag" => $resCat,
					"underCat" => $resUnder,
					"prdCat" => $prdCat,
					"countPrd" => $countPrd,
					"countClient" => $countClient,
					"feedback" => $resFeed,
					"allClient" => $allClient,
					"allProvider" =>$allProvider,
					"allprdOrder" => $allprdOrder,
					"countReview" => $countReview,
					"allReview" => $allReview
				]);
			} else {
				php\App::renderPages("admin", [
					"defTag" => $resCat,
					"underCat" => $resUnder,
					"prdCat" => $prdCat,
					"countPrd" => $countPrd,
					"countClient" => $countClient,
					"feedback" => $resFeed,
					"allClient" => $allClient,
					"allProvider" => $allProvider,
					"countReview" => $countReview,
					"allReview" => $allReview
				]);
			}
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

	$router->post("/adminLogout", function(){
		unset($_SESSION["admin-auth"]);
		\php\App::redirect("shop/signAdmin");
	});

	$router->post("/loguotUser", function(){
		unset($_SESSION["auth"]);
		\php\App::redirect("shop/");
	});

	$router->get("/regUser", function (){
		\php\App::renderPages("registration");
	});

	$router->post("/registration", "User:registration");

	$router->post("/signIn", "User:signIn");

	$router->post("/feedBack", "User:feedBack");

	$router->post("/del-def", "Admin:delDef");

	$router->post("/del-under", "Admin:delUnder");

	$router->post("/delProduct", "Admin:delPrd");

	$router->get("/signUser", function (){
		\php\App::renderPages("signIn");
	});

	// чисто инфа
	$router->get("/oplata", function(){
		$product = new \php\model\product\Product();

		$newOne = $product->getOnApprove("Новинка", 1);
		$newTwo = $product->getOnApprove("Новинка", 2);
		
		$new = [
			"newOne" => $newOne,
			"newTwo" => $newTwo,
		];

		$order = new \php\model\order\Order();
		$order->getCunt($_SESSION["dataUser"][0]["idclient"]);


		$defCat = new \php\model\category\DefCategory();
		$defUnderCat = new \php\model\category\UnderCat();

		$resCat = $defCat->getAll();
		$resUnder = $defUnderCat->getAll();

		\php\App::renderPages("oplata", [
				"resCat" => $resCat,
				"resUnder" => $resUnder,
				"new" => $new
			]);
	});

	$router->get("/admin/product", function(){
		$product = $_POST["product"];

		$productCategory = new \php\model\join\ProductCategory();
		$res = $productCategory->getProductOnApprove($product);

		if (!empty($res)) {
			$resProduct = [
				"resProduct" => $res,
				"status" => "ok"
			];
		} else {
			$resProduct = [
				"status" => "nope"
			];
		}

		echo json_encode($resProduct);
	
	});

	$router->get("/getUser", function(){
		$client = new \php\model\client\Client();
		$allClient = $client->getAllC();

		if (!empty($allClient)) {
			$resClient = [
				"allClient" => $allClient,
				"status" => "ok"
			];
		} else {
			$resClient = [
				"allClient" => $allClient,
				"status" => "nope"
			];
		} 

		echo json_encode($resClient);
	});

	$router->get("/product", function(){
		$category = $_GET["product-name"];
		$product = new \php\model\product\Product();

		$newOne = $product->getOnApprove("Новинка", 1);
		$newTwo = $product->getOnApprove("Новинка", 2);

		$order = new \php\model\order\Order();
		$order->getCunt($_SESSION["dataUser"][0]["idclient"]);
		
		$new = [
			"newOne" => $newOne,
			"newTwo" => $newTwo,
		];
		$defCat = new \php\model\category\DefCategory();
		$defUnderCat = new \php\model\category\UnderCat();

		$resCat = $defCat->getAll();
		$resUnder = $defUnderCat->getAll();


		$productCategory = new \php\model\join\ProductCategory();
		$res = $productCategory->getPrdOnUnder($category);
	
		\php\App::renderPages("onCategory", [
				"res" => $res,
				"resCat" => $resCat,
				"resUnder" => $resUnder,
				"new" => $new
			]);
	});

	$router->post("/seeProduct", function(){
		$id = $_POST["id"];

		$productCategory = new \php\model\join\ProductCategory();
		$prdCat = $productCategory->getPrdOnId($id);

		echo json_encode($prdCat);

	});

	$router->get("/admin/Product", function(){
		$id = $_GET["id"];
		$articul = $_GET["articul"];

		$productCategory = new \php\model\join\ProductCategory();
		$prdCat = $productCategory->getPrdOnId($id);

		\php\App::renderPages("admin-product", [
				"prdCat" => $prdCat
			]);
	});

	$router->get("/feedback", function(){
		$product = new \php\model\product\Product();

		$newOne = $product->getOnApprove("Новинка", 1);
		$newTwo = $product->getOnApprove("Новинка", 2);

		$new = [
			"newOne" => $newOne,
			"newTwo" => $newTwo,
		];

		$defCat = new \php\model\category\DefCategory();
		$defUnderCat = new \php\model\category\UnderCat();

		$resCat = $defCat->getAll();
		$resUnder = $defUnderCat->getAll();


		\php\App::renderPages("feedback",  [
				"resCat" => $resCat,
				"resUnder" => $resUnder,
				"new" => $new
			]);
	});

	$router->get("/pravila-vozvrata", function(){

		$product = new \php\model\product\Product();

		$newOne = $product->getOnApprove("Новинка", 1);
		$newTwo = $product->getOnApprove("Новинка", 2);
		
		$new = [
			"newOne" => $newOne,
			"newTwo" => $newTwo,
		];

		$defCat = new \php\model\category\DefCategory();
		$defUnderCat = new \php\model\category\UnderCat();

		$resCat = $defCat->getAll();
		$resUnder = $defUnderCat->getAll();

		\php\App::renderPages("pravila",  [
				"resCat" => $resCat,
				"resUnder" => $resUnder,
				"new" => $new
			]);
	});

	$router->get("/shares", function(){
		$product = new \php\model\product\Product();

		$newOne = $product->getOnApprove("Новинка", 1);
		$newTwo = $product->getOnApprove("Новинка", 2);
		
		$new = [
			"newOne" => $newOne,
			"newTwo" => $newTwo,
		];

		$defCat = new \php\model\category\DefCategory();
		$defUnderCat = new \php\model\category\UnderCat();

		$resCat = $defCat->getAll();
		$resUnder = $defUnderCat->getAll();

		\php\App::renderPages("shares",  [
				"resCat" => $resCat,
				"resUnder" => $resUnder,
				"new" => $new
			]);
	});

	$router->get("/dostavka", function(){
		$product = new \php\model\product\Product();

		$newOne = $product->getOnApprove("Новинка", 1);
		$newTwo = $product->getOnApprove("Новинка", 2);
		
		$new = [
			"newOne" => $newOne,
			"newTwo" => $newTwo,
		];

		$defCat = new \php\model\category\DefCategory();
		$defUnderCat = new \php\model\category\UnderCat();

		$resCat = $defCat->getAll();
		$resUnder = $defUnderCat->getAll();

		\php\App::renderPages("dostavka", [
				"resCat" => $resCat,
				"resUnder" => $resUnder,
				"new" => $new
			]);
	});

	$router->get("/help", function(){
		$product = new \php\model\product\Product();

		$newOne = $product->getOnApprove("Новинка", 1);
		$newTwo = $product->getOnApprove("Новинка", 2);
		
		$new = [
			"newOne" => $newOne,
			"newTwo" => $newTwo,
		];

		$defCat = new \php\model\category\DefCategory();
		$defUnderCat = new \php\model\category\UnderCat();

		$resCat = $defCat->getAll();
		$resUnder = $defUnderCat->getAll();

		\php\App::renderPages("help", [
				"resCat" => $resCat,
				"resUnder" => $resUnder,
				"new" => $new
			]);
	});

	$router->get("/providerSign", function(){
		\php\App::renderPages("providerSign");
	});

	$router->post("/signProvider", "Provider:signProvider");

	$router->get("/provider", function(){
		if ($_SESSION["auth-provider"]) {
			$order = new \php\model\order\Order();
			$product = new \php\model\product\Product();
			$prdOrder = new \php\model\join\ProductOrder();
			$client = new \php\model\client\Client();

			$allOrder = $order->getOnApprove();
			$clientId = $order->getClientId($allOrder);

			$clientData = $client->getOnId($clientId);

			$onPrdOrder = $prdOrder->getProductId($allOrder);
			$onIdProduct = $product->getOnIdHas($onPrdOrder);
	
			foreach ($allOrder as $key => $value) {
				$allprdOrder[$key] = array_merge($allOrder[$key], $onIdProduct[$key]);
			}

			foreach ($allprdOrder as $key => $value) {
				$clientPrdOrder[$key] = array_merge($allprdOrder[$key], $clientData[$key]);
			}
				
			\php\App::renderPages("provider", [
					"clientPrdOrder" => $clientPrdOrder
				]);
			
		} else {
			\php\App::redirect("shop/providerSign");
		}
	});

	$router->post("/addBasketPrd", "User:addBasketPrd");

	$router->post("/delItemBasket", function(){
		$id = $_POST["id"];
		$approve = 1;
		$order = new \php\model\order\Order();
		$order->changeApprove($id, $approve);

		$order = new \php\model\order\Order();
		$order->getCunt($_SESSION["dataUser"][0]["idclient"]);
		
	});

	$router->post("/delProvider", function(){
		$id = $_POST["id"];
		$id = intval($id);
		$approve = 1;
		$provider = new \php\model\provider\Provider();
		$provider->changeApprove($id, $approve);
	});

	$router->post("/takeOrder", function(){
		$remot = $_POST["remot"];
		$orderid = $_POST["orderid"];

		if ($remot === "Москва") {
			$delivery = new \php\model\delivery\Delivery();
			$providerHasDilev = new \php\model\has\ProviderHasDelivery();
			$order = new \php\model\order\Order();
			$idDelivery = $delivery->add(700, 0);
			$providerHasDilev->add($_SESSION["dataProvider"][0]["id"], $idDelivery);
			$order->setDeliveryId($idDelivery, $orderid);


		} else {
			$delivery = new \php\model\delivery\Delivery();
			$providerHasDilev = new \php\model\has\ProviderHasDelivery();
			$order = new \php\model\order\Order();
			$delivery->add(1000, 0);
			$providerHasDilev->add($_SESSION["dataProvider"][0]["id"], $idDelivery);
			$order->setDeliveryId($idDelivery, $orderid);
		}
		
	});

	$router->post("/orderDelivered", function(){
		if ($_SESSION["auth-provider"]) {
			$orderid = $_POST["orderid"];
			$order = new \php\model\order\Order();
			$order->changeApprove($orderid, 4);
		}
	});

	$router->get("/userSettings", function(){
		if (isset($_SESSION["auth"])) {
		$product = new \php\model\product\Product();
		$defCat = new \php\model\category\DefCategory();
		$defUnderCat = new \php\model\category\UnderCat();
		$order = new \php\model\order\Order();
		$prdOrder = new \php\model\join\ProductOrder();

		$orderOnId = $order->getOnId($_SESSION["dataUser"][0]["idclient"]);

		$onPrdOrder = $prdOrder->getProductId($orderOnId);
		$onIdProduct = $product->getOnIdHas($onPrdOrder);

		$newOne = $product->getOnApprove("Новинка", 1);
		$newTwo = $product->getOnApprove("Новинка", 2);
		
		$new = [
			"newOne" => $newOne,
			"newTwo" => $newTwo,
		];

		$resCat = $defCat->getAll();
		$resUnder = $defUnderCat->getAll();


		if (!empty($orderOnId) && !empty($onIdProduct)) {
			foreach ($orderOnId as $key => $value) {
				$basket[$key] = array_merge($orderOnId[$key], $onIdProduct[$key]);
			}
			\php\App::renderPages("userSettings", [
					"resCat" => $resCat,
					"resUnder" => $resUnder,
					"new" => $new,
					"basket" => $basket
				]);
		} else {
			\php\App::renderPages("userSettings", [
					"resCat" => $resCat,
					"resUnder" => $resUnder,
					"new" => $new
				]);
		}
			
		} else {
			\php\FlashPush::add("auth-err", "Вы не авторизовались");
			\php\App::redirect("shop/signUser");
		}
	});

	$router->post("/changeUser", function(){
		if (isset($_SESSION["auth"])) {
			if ( !empty($_POST["email"]) && !empty($_POST["pass"]) && !empty($_POST["full_name"]) && !empty($_POST["tel"]) ) {
				if ( $_POST["tel"] == intval($_POST["tel"]) && $_POST["tel"] > 0 ) {
					$email = $_POST["email"];
					$pass = $_POST["pass"];
					$full_name = $_POST["full_name"];
					$addres = $_POST["addres"];
					$data = $_POST["data"];
					$tel = $_POST["tel"];
					
					$client = new \php\model\client\Client(); 
					$passwordHash = password_hash($pass, PASSWORD_DEFAULT);

					$client->change($email, $passwordHash, $full_name, $addres, $data, $tel);
				} else {
					\php\FlashPush::add("tel", "Вы ввели неправильный телефон");
					\php\App::redirect("shop/userSettings");
				}
			} else {
				\php\FlashPush::add("user-input", "Вы не заполнили все поля");
				\php\App::redirect("shop/userSettings");
			}
		} else {
			\php\FlashPush::add("auth-err", "Вы не авторизовались");
			\php\App::redirect("shop/signUser");
		}
	});

	$router->get("/prd", function(){
		$id = $_GET["product-id"];
		$article = $_GET["article"];
		$product = new \php\model\product\Product();
		$newOne = $product->getOnApprove("Новинка", 1);
		$newTwo = $product->getOnApprove("Новинка", 2);
		$defCat = new \php\model\category\DefCategory();
		$defUnderCat = new \php\model\category\UnderCat();
		$resCat = $defCat->getAll();
		$resUnder = $defUnderCat->getAll();

		$revies = new \php\model\reviews\Reviews();
		$revOnPrd = $revies->getOnPrd($id);

		$new = [
			"newOne" => $newOne,
			"newTwo" => $newTwo,
		];

		$product = new \php\model\product\Product();
		$prd = $product->getPrd($id, $article);

		if (empty($prd)) {
			\php\App::redirect("shop/");
		} else {
			\php\App::renderPages("prd", [
				"prd" => $prd,
				"new" => $new,
				"resCat" => $resCat,
				"resUnder" => $resUnder,
				"id" => $id,
				"revOnPrd" => $revOnPrd
			]);
		}

		
	});

	$router->post("/searchReviews" , function(){
		if ($_SESSION["admin-auth"]) {
			$query = $_POST["query"];

			$review = new \php\model\reviews\Reviews();
			$response = $review->search($query);


			if ($response) {
				$res = [
					"all" => $response,
					"status" => "ok"
				];
			} else {
				$res = [
					"status" => "nope"
				];
			}
			echo json_encode($res);
		}
	});

	$router->post("/allReviews", function(){
		if ($_SESSION["admin-auth"]) {
			$review = new \php\model\reviews\Reviews();

			$allReview = $review->getAll();

			if ($allReview) {
				$res = [
					"all" => $allReview,
					"status" => "ok"
				];
			} else {
				$res = [
					"status" => "nope"
				];
			}

			echo json_encode($res);
		}
		
	});

	$router->post("/delReview", function(){
		if ($_SESSION["admin-auth"]) {
			$id = $_POST["id"];

			$review = new \php\model\reviews\Reviews();
			$review->changeApprove($id, 1);
		}
	});

	$router->post("/emptyQuery", function(){
		if ($_SESSION["admin-auth"]) {
			$review = new \php\model\reviews\Reviews();

			$allReview = $review->getAll();

			if ($allReview) {
				$res = [
					"all" => $allReview,
					"status" => "ok"
				];
			} else {
				$res = [
					"status" => "nope"
				];
			}

			echo json_encode($res);
		}
	});