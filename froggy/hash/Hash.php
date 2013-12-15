<?php

class Hash {

	public static function make($data){
		echo "$".self::algo($data)."$";
	}

	public static function algo($data){
		$var1 = hash_init('md5',HASH_HMAC,Configuration::$SECURITYKEY);
		hash_update($var1, $data);
		
		$var = hash_init('sha1',HASH_HMAC,Configuration::$SECURITYKEY);
		hash_update($var, hash_final($var1));
		return hash_final($var);
	}

	public static function md5($data){
		$var = hash_init('md5',HASH_HMAC,Configuration::$SECURITYKEY);
		hash_update($var, $data);
		echo hash_final($var);
	}

	public static function sha1($data){
		$var = hash_init('sha1',HASH_HMAC,Configuration::$SECURITYKEY);
		hash_update($var, $data);
		echo hash_final($var);
	}

}