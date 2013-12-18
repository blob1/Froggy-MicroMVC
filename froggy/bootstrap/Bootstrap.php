<?php

class Bootstrap {

	function __construct(){

		session_start();
		require 'app/config/config.php';

        self::get(self::getUrl('url'),Configuration::$DEF_CONTROLLER.'@'.Configuration::$DEF_METHOD);
        
	}

    public static function get($url,$control=''){

        $var = explode("@", $control);
        if(count($url)==1 && empty($url[0])){
            self::goToController($var[0],$var[1],array());
        }elseif(count($url)==1 && !empty($url[0])){
            self::goToController($url[0],$var[1],array());
        }elseif(count($url)==2 ){
            self::goToController($url[0],$url[1],array());
        }else{
            $para=array();
            for ($i=2; $i < count($url); $i++) { 
                $param[]=$url[$i];
            }
            self::goToController($url[0],$url[1],$param);
        }

    }

    public static function getUrl($link){
        if(isset($_GET[$link])){
            $url=$_GET[$link];
            $url=  rtrim($url, '/');
            $url=  explode('/', $url);
            return $url;
        }else{
            return false;
        }
    }

    public static function goToController($class,$name,$param=array()){
        $controller=new $class();
        call_user_func_array(array($controller, $name), $param);
    }

}