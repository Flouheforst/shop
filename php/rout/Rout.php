<?php 


	namespace php\rout;

	define("PATH_TO_ACTION", "php\\action\\");

	class Rout {
		
		protected $pattern;
		protected $methods;
		protected $action;

		/**
		* Initialization options
		* @param array   $method  The transferred method
		* @param string   $pattern  The rout uri
		* @param callable|string $action The group callable or class
		*/
		function __construct($methods, $pattern, $action) {
			$this->pattern = $pattern;
			$this->methods = $methods;
			$this->action = $action;
		}

		/**
		* return pattern 
		* @return pattern
		*/
		public function getPattern(){
			return $this->pattern;
		}

		/**
		* return action 
		* @return action
		*/
		public function getAction(){
			return $this->action;
		}

		/**
		* Test closure
		* @return boolean
		*/
		public function is_closure() {
			if (is_callable($this->action)) {
				return true;
			} else {
				return false;
			} 

		}

		/**
		* Run application
		* @param string $type choice between Closure or ActionClass
		*/
		public function run($type){
			if ($type === "string") {

				$method = substr(stristr($this->action, ":"), 1);
				$class = stristr($this->action, ":", true);

				$controller = PATH_TO_ACTION . $class;

				$contr_obj = new $controller();
				call_user_func_array(array($contr_obj, $method), array());
			} 

			if ($type === "callable"){
				call_user_func($this->action);
			}	
		}
	} 
