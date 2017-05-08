<?php 

	namespace php\model;

	class Db {

		private static $instance;
		public $db;

		private function __construct(){
			$this->db =  new \SafeMySQL([
				'host'	=> MYSQL_HOST,
				'user'  => MYSQL_USER,
				'pass'  => MYSQL_PASS,
				'db'    => MYSQL_DB,
				'charset' => CHARSET
			]); 
		}

		public static function getInstance(){
			if (self::$instance == null) {
				self::$instance = new self;
			}
			return self::$instance;
		}


	} 