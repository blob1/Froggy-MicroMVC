<?php

class Validate {

	private static $msg=array();

	public static function check($data,$role){

		$c=null;

		foreach ($data as $key => $value) {
			foreach ($role as $k => $v) {
				if($key==$k){
					$var=explode("|", $v);
					foreach ($var as $ye) {
						$m=explode("=", $ye);
						if(count($m)>1){
							$c.= self::$m[0]($key,$m[1],$value);
						}else{
							$c.= self::$ye($key,$value);
						}
						
					}
				}
			}
		}

		if(count(self::$msg)>0){
			return false;
		}else{
			return true;
		}
		
	}

	public static function errors(){
		return self::$msg;
	}

	private static function required($key,$val){
		if(empty($val)){
			self::$msg[]="$key is required";
			return 0;
		}else{
			return 1;
		}
	}

	private static function min($key,$length,$val){
		if(strlen($val) < $length){
			self::$msg[]="$key too short, require $length characters";
			return 0;
		}else{
			return 1;
		}
	}

	private static function max($key,$length,$val){
		if(strlen($val) > $length){
			self::$msg[]="$key too many, require $length characters";
			return 0;
		}else{
			return 1;
		}
	}

	private static function int($key,$val){
		if(!is_int($val)){
			self::$msg[]="$key can only be integer";
			return 0;
		}else{
			return 1;
		}
	}

	private static function string($key,$val){
		if(!is_string($val)){
			self::$msg[]="$key can only be string";
			return 0;
		}else{
			return 1;
		}
	}

	private static function double($key,$val){
		if(!is_double($val)){
			self::$msg[]="$key can only be double";
			return 0;
		}else{
			return 1;
		}
	}

}