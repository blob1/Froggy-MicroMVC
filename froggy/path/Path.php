<?php

class Path {

	public static function base_path(){
		return Configuration::$BASE_PATH;
	}

	public static function public_path(){
		return Configuration::$BASE_PATH . 'public/';
	}

	public static function current_path(){
		return "http" . (($_SERVER['SERVER_PORT']==443) ? "s://" : "://") . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
	}

	public static function to_path(){
		$req=explode("/", $_SERVER['REQUEST_URI']);
		return  "http" . (($_SERVER['SERVER_PORT']==443) ? "s://" : "://") . $_SERVER['HTTP_HOST'] . '/'.$req[1];		
	}

}