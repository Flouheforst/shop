<?php 

	namespace php\rout;

	class Router{

		protected $routes;

		public function __construct() {
			$this->routes = [];
		} 

		/**
		* Add GET route
		*
		* @param  string $pattern  The route URI pattern
		* @param  callable|string  $callable The route callback or class
		* 
		*/
		public function get($pattern, $action){
			$this->map(["GET"], $pattern, $action);
		}

		/**
		* Add POST route
		*
		* @param  string $pattern  The route URI pattern
		* @param  callable|string  $callable The route callback or class
		* 
		*/
		public function post($pattern, $action){
			$this->map(["POST"], $pattern, $action);
		}

		/**
		* Create a new Rout
		* @param array   $method  The transferred method
		* @param string   $pattern  The rout uri
		* @param callable|string $action The group callable or class
		*/
		public function map($method, $pattern, $action){
			$this->routes[] = new Rout($method, $pattern, $action);
		}

		/**
		* Start processing paths 
		*/
		public function start(){
			$path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
			$path = substr($path, 5);

			foreach ($this->routes as $rout) {
				if ($path === $rout->getPattern()) {
					if (is_string($rout->getAction())) {
						$rout->run("string");
					}

					if ($rout->is_closure()) {
						$rout->run("callable");
					}
				} 
			}
		}
	} 
