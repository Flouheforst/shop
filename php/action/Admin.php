<?php 

	namespace php\action;

	class Admin {

		public function addProduct(){
			if ($_SESSION["admin-auth"]) {
				if ( !empty($_POST["name"]) && !empty($_POST["price"]) && !empty($_POST["brand"]) && !empty($_POST["article"])   && !empty($_POST["quatity"]) && !empty($_POST["desciption"]) ) {
					$price = $_POST["price"];
					$name = $_POST["name"];
					$brand = $_POST["brand"];
					$article = $_POST["article"];
					$deminsion = $_POST["deminsion"];
					$mark = $_POST["mark"];
					$quatity = $_POST["quatity"];
					$desciption = $_POST["desciption"];
					$productApprove = $_POST["product"];

					$categotyUnder = $_POST["categoty"];
					
					$uploaddir = "assets/image/product/";
					$uploadfile = $uploaddir . $_FILES['photo']['name'];

					if (move_uploaded_file($_FILES['photo']['tmp_name'], $uploadfile)) {
						$product = new \php\model\product\Product();
						$product->addProduct($price, $brand, $article, $deminsion, $mark, $quatity, $desciption, $productApprove, $uploadfile, $name);

						$defUnderCat = new \php\model\category\UnderCat();
						$idUnder = $defUnderCat->getDefCategoryId($categotyUnder);

						$defCat = new \php\model\category\DefCategory();
						$nameCat = $defCat->getName($idUnder);

						$category = new \php\model\category\Category();
						$category->addCategory($nameCat, $categotyUnder);

						$idPrd = $product->getId($price, $brand, $article);
						$idCat = $category->getId($nameCat, $categotyUnder);
						
						$prdHasCat = new \php\model\has\ProductHasCategory();
						$prdHasCat->addHas($idPrd, $idCat["id"]);
							
						\php\App::redirect("shop/admin");
					}  else {
					\php\App::redirect("shop/admin");
					// нету картинки
				}
				} else {
					\php\App::redirect("shop/admin");
					// не все поля заполнены
				} 
			} else {
				\php\App::redirect("shop/signAdmin");
				// вы не пошли
			}
		}

		public function delDef(){
			$id = $_POST["defCat"];
			
			$cat = new \php\model\category\DefCategory();
			$nameCat = $cat->getName($id);
			$cat->delUnderOnDef($id);

			$undr = new \php\model\category\UnderCat();
			$underRes = $undr->delUnderOnDef($id);

			if ($catRes === "success" && $underRes === "success") {
				
				$category = new \php\model\category\Category();
				$resCat = $category->getOnApprove($nameCat);

				$prdHasCat = new \php\model\has\ProductHasCategory();
				$prdCat = $prdHasCat->onCat($resCat);
				
				$product = new \php\model\product\Product();
				$product->changeApprove($prdCat, "Удален");
			}

			
		}

		public function delUnder(){
			$id = $_POST["defUnder"];

			$undr = new \php\model\category\UnderCat();
			$nameUnder = $undr->getName($id);
			$underRes = $undr->delUnder($id);

			$category = new \php\model\category\Category();
			$resCat = $category->getOnAprUnder($nameUnder);

			$prdHasCat = new \php\model\has\ProductHasCategory();
			$prdCat = $prdHasCat->onCatUnder($resCat);

			$product = new \php\model\product\Product();
			$product->changeApprove($prdCat, "Удален");
		
			if ($underRes) {
				echo "success";
			}
		}

		public function delPrd(){
			$id = $_POST["id"];

			$product = new \php\model\product\Product();
			$product->deleteOnId($id, "Удален");
			echo "success";
		}
	} 