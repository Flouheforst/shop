<?php 

	namespace php\model\has;

	class ProductHasCategory extends \php\model\Model {

		public function tableName(){
			return "shop.`product_has_category`";
		}

		public function fields(){
			return ["id", "Product_id", "category_id"];
		}

		public function addHas($idPrd, $idCat){
			$idPrd = intval($idPrd);
			$idCat = intval($idCat);
			$this->db->query("INSERT into $this->tableName(Product_id, category_id) values(?s, ?s)", $idPrd, $idCat);

		}
		
		public function onCat($resCat){
			$catPrd ;
			foreach ($resCat as $key => $value) {
				$catPrd[$key] = $this->db->getOne("select Product_id from $this->tableName where category_id = ?s", $value["id"]);
			}

			return $catPrd;
		}

		public function onCatUnder($resCat){
			$catPrd;
			foreach ($resCat as $key => $value) {
				$catPrd[$key] = $this->db->getOne("select Product_id from $this->tableName where category_id = ?s", $value["id"]);
			}

			return $catPrd;
		}
	} 