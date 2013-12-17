<?php

class View {

	public static function make($path,$data=null,$msg=array()){

		foreach ($msg as $key => $value) {
			Session::set($key,$value);
		}

		if(!is_null($data)){
			extract($data);
		}
		
		$dir = 'app/Views/';
		require $dir . $path . '.php';
	}

	public static function show($path,$msg=array()){

		foreach ($msg as $key => $value) {
			Session::set($key,$value);
		}

		$dir = 'app/Views/';
		require $dir . $path . '.php';
	}

	public static function showError($errorCode){
		if($errorCode==404){
			$var="Not Found";
		}elseif($errorCode==500){
			$var="Internal Service Error";
		}elseif($errorCode==403){
			$var="Access Forbidden";
		}elseif($errorCode==400){
			$var="Bad request";
		}elseif($errorCode==408){
			$var="Request Time Out";
		}

		echo "<!DOCTYPE html>\n<html>\n<head>\n<title>Froggy Error Status</title>\n</head>\n<body>\n<h1>$errorCode $var</h1>\n</body>\n</html>\n";
	}
}
