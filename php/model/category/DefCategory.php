<?php 

	namespace php\model\category;

	class DefCategory extends \php\model\Model {

		public function tableName(){
			return "shop.`def-category`";
		}

		public function fields(){
			return ["id", "name", "approve"];
		} 
	} 