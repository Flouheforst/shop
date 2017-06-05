<?php 

	namespace php\model\join;

	class ProductCategory{

		public function __construct(){
			$this->db = \php\model\Db::getInstance()->db;
		}

		public function getPrdCat(){
			return $this->db->getAll("SELECT shop.product.id, shop.product.data, shop.product.price, shop.product.approve, shop.product.photo,shop.product.name, shop.product.brand, shop.product.vendor_code, shop.product.dimensions, shop.product.quantity, shop.category.name_def, shop.category.name_under
				FROM shop.product INNER JOIN shop.product_has_category ON shop.product.id = shop.product_has_category.product_id
				INNER JOIN shop.category ON shop.product_has_category.category_id = shop.category.id");
		}

		public function getProductOnApprove($approve){
			return $this->db->getAll("SELECT shop.product.id, shop.product.data, shop.product.price, shop.product.approve, shop.product.photo,shop.product.name, shop.product.brand, shop.product.vendor_code, shop.product.dimensions, shop.product.quantity, shop.category.name_def, shop.category.name_under
				FROM shop.product INNER JOIN shop.product_has_category ON shop.product.id = shop.product_has_category.product_id
				INNER JOIN shop.category ON shop.product_has_category.category_id = shop.category.id where approve = ?s", $approve);
		}

		public function getPrdCatNotDel(){
			return $this->db->getAll("SELECT shop.product.id, shop.product.data, shop.product.price, shop.product.approve, shop.product.photo,shop.product.name, shop.product.brand, shop.product.vendor_code, shop.product.dimensions, shop.product.quantity, shop.category.name_def, shop.category.name_under
				FROM shop.product INNER JOIN shop.product_has_category ON shop.product.id = shop.product_has_category.product_id
				INNER JOIN shop.category ON shop.product_has_category.category_id = shop.category.id where approve != 'Удален'");
		}

		public function find($valueSearch){
			return $this->db->getAll("SELECT shop.product.id, shop.product.data, shop.product.price, shop.product.approve, shop.product.photo,shop.product.name, shop.product.brand, shop.product.vendor_code, shop.product.dimensions, shop.product.quantity, shop.category.name_def, shop.category.name_under
				FROM shop.product INNER JOIN shop.product_has_category ON shop.product.id = shop.product_has_category.product_id
				INNER JOIN shop.category ON shop.product_has_category.category_id = shop.category.id where approve != 'Удален' and vendor_code like ?s or name like ?s", "%" . $valueSearch . "%", "%" . $valueSearch . "%");
		}

		public function getPrdOnId($id){
			return $this->db->getAll("SELECT shop.product.id, shop.product.data, shop.product.price, shop.product.approve, shop.product.photo,shop.product.name, shop.product.brand, shop.product.vendor_code, shop.product.dimensions, shop.product.quantity, shop.category.name_def, shop.category.name_under
				FROM shop.product INNER JOIN shop.product_has_category ON shop.product.id = shop.product_has_category.product_id
				INNER JOIN shop.category ON shop.product_has_category.category_id = shop.category.id where shop.product.id = ?s", $id);
		}

		public function getPrdOnUnder($under){
			return $this->db->getAll("SELECT shop.product.id, shop.product.data, shop.product.price, shop.product.approve, shop.product.photo,shop.product.name, shop.product.brand, shop.product.vendor_code, shop.product.dimensions, shop.product.quantity, shop.category.name_def, shop.category.name_under
				FROM shop.product INNER JOIN shop.product_has_category ON shop.product.id = shop.product_has_category.product_id
				INNER JOIN shop.category ON shop.product_has_category.category_id = shop.category.id where shop.category.name_under = ?s and approve != 'Удален'", $under);
		}
	} 