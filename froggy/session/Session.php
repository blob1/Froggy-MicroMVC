<?php

class Session {

	public static function set($key,$value){
		$_SESSION[$key]=$value;
	}

	public static function get($key){
		return $_SESSION[$key];
	}

	public static function has($key){
		if(isset($_SESSION[$key])){
			return true;
		}else{
			return false;
		}
	}

	public static function flash($key){
		if(self::has($key)){
			$var =self::get($key);
			self::destroy($key);
			return $var;
		}
	}

	public static function destroy($key){
		unset($_SESSION[$key]);
	}

}