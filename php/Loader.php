<?php 

	namespace php;

	class Loader{

		public function loadClass($classname){
			$classname = preg_replace('/\\\\+/','/', $classname) . ".php"; 
			if (file_exists($classname) && (is_file($classname))) {
				require $classname;
			}
		}
	}