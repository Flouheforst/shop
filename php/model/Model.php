<?php 
	namespace php\model;

	abstract class Model {

		protected $table;
		protected $fields;
		protected $db;
		
		public function __construct() {
			$this->tableName = $this->tableName();
			$this->fields = implode(", ", $this->fields());
			$this->db = \php\model\Db::getInstance()->db;
		} 
	} 