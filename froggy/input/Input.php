<?php

class Input {

	public static function get($name){
		if(isset($_POST[$name])){
			return $_POST[$name];
		}else{
			return $_GET[$name];
		}
	}

	public static function files($name){		
		return $_FILES[$name];		
	}

}