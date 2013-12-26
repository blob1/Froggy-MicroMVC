<?php

class Bootstrap {

	function __construct(){

		session_start();

        self::get(self::getUrl('url'));
        
	}

    private static function get($url){

        $var = $url;

        self::load($url);
        if(!empty($url)){
            if(method_exists($url[0],isset($url[1]) ? $url[1] : Configuration::$DEF_METHOD )){
                if(isset($url[1])){
                    array_shift($var);
                    array_shift($var);
                    self::goToController($url[0],$url[1],$var);
                }else{
                    self::goToController($url[0],Configuration::$DEF_METHOD);
                }
            }else{
                View::showError(404);
            }
        }else{
            self::goToController(ucfirst(Configuration::$DEF_CONTROLLER),Configuration::$DEF_METHOD);
        }


    }

    private static function getUrl($link){
        if(isset($_GET[$link])){
            $url=$_GET[$link];
            $url=  rtrim($url, '/');
            $url=filter_var($url,FILTER_SANITIZE_URL);
            $url=  explode('/', $url);
            return $url;
        }else{
            return false;
        }
    }

    private static function load($path){
        $file ='app/Controllers/'.ucfirst($path[0]).'.php';
        if(file_exists($file)){
            require 'app/Controllers/'.ucfirst($path[0]).'.php';
        }else{
            require 'app/Controllers/'.ucfirst(Configuration::$DEF_CONTROLLER).'.php';
        }       
    }

    private static function goToController($class,$name,$param=array()){
        $controller=new $class();
        call_user_func_array(array($controller, $name), $param);
    }

}