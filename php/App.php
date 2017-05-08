<?php 

	namespace php;

	session_start();

	error_reporting(E_ALL); 
	ini_set('display_errors', 1);

	require "vendor/safemysql.class.php";
	require "Loader.php";
	
	$load = new Loader();

	spl_autoload_register([$load, "loadClass"]);

	define("MYSQL_HOST", "localhost");
	define("MYSQL_USER", "root");
	define("MYSQL_PASS", "root");
	define("MYSQL_DB", "shop");
	define("CHARSET", "utf8");

	class App{

		public static function renderPages($template, $data = []){
			ob_start();
				extract($data);
				include("resourses/pages/$template.view.php");
			echo ob_get_clean();
		}

		public static function renderTemplate($template, $data = []){
			ob_start();
				extract($data);
				include("resourses/template/$template.view.php");
			echo ob_get_clean();
		}
		public static function redirect($action) {
			header("Location: /$action");
		}
	}

	$app = new App();

	$router = new rout\Router();

	require "routes.php";

	$router->start();