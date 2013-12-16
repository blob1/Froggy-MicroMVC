<?php

class Path {

	public static function base_path(){
		return Configuration::$BASE_PATH;
	}

	public static function action(){
		return Configuration::$BASE_PATH;	
	}

	public static function public_path(){
		return Configuration::$BASE_PATH . 'public/';
	}

	public static function full_path(){
		return "http" . (($_SERVER['SERVER_PORT']==443) ? "s://" : "://") . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
	}

}