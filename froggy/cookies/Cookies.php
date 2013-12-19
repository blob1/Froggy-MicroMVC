<?php

class Cookies {
	
	public static function set($name, $value, $expire){
		return setcookie($name, $value, $expire);
	}

	public static function get($key){
		return $_COOKIES[$key];
	}

}