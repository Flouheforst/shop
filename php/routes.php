<?php 
	
	$router->get("/", function(){

		$defCat = new \php\model\category\DefCategory();
		$defUnderCat = new \php\model\category\UnderCat();

		$product = new \php\model\product\Product();
		$productCategory = new \php\model\join\ProductCategory();

		$order = new \php\model\order\Order();
		$order->getCunt($_SESSION["dataUser"][0]["idclient"]);

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
				"new" => $new
			]);

	});

	$router->get("/basket", function(){
		if ($_SESSION["auth"]) {
			$product = new \php\model\product\Product();
			$order = new \php\model\order\Order();

			$orderOnId = $order->getOnId($_SESSION["dataUser"][0]["idclient"]);

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

			\php\App::renderPages("basket", [
					"resCat" => $resCat,
					"resUnder" => $resUnder,
					"new" => $new,
					"orderOnId" => $orderOnId
				]);
		}
	});

	$router->post("/search", function(){
		$valueSearch = $_POST["search"];
		if (!empty($valueSearch)) {
			$productCat = new \php\model\join\ProductCategory();
			$product = new \php\model\product\Product();
			$defCat = new \php\model\category\DefCategory();
			$defUnderCat = new \php\model\category\UnderCat();

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

			$res = $productCat->find($valueSearch);

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

		$productCategory = new \php\model\join\ProductCategory();
		$prdCat = $productCategory->getPrdCatNotDel();

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

			php\App::renderPages("admin", [
					"defTag" => $resCat,
					"underCat" => $resUnder,
					"prdCat" => $prdCat,
					"countPrd" => $countPrd,
					"countClient" => $countClient,
					"feedback" => $resFeed,
					"allClient" => $allClient
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
			\php\App::renderPages("provider");

			$provider = new \php\model\provider\Provider();
			
		} else {
			\php\App::redirect("shop/providerSign");
		}
	});

	$router->post("/addBasketPrd", "User:addBasketPrd");

	$router->get("/userSettings", function(){

	});

	$router->get("/userLogout", function(){

	});