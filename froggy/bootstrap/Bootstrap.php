<?php

class Bootstrap {

	function __construct(){

		session_start();

		require 'app/config/config.php';

		$url = isset($_GET['url']) ? $_GET['url'] : null;
        $url=  rtrim($url, '/');
        $url=  explode('/', $url);

        if(empty($url[0])){
        	$var = Configuration::$DEF_CONTROLLER;
        	require 'app/Controllers/'.$var.'.php';
            $controller = new $var();
            $controller->{Configuration::$DEF_METHOD}();
        }else{
            $file='app/Controllers/'.$url[0].'.php';
            if(file_exists($file)){
                require $file;
            }else{
                View::showError(404);
                return false;
            }
            
            $controller=new $url[0];

            if(isset($url[2])){
                if(method_exists($controller, $url[1])){
                    $controller->$url[1]($url[2]);
                }else{
                    View::showError(404);
                }
            }else{
                if(isset($url[1])){
	                if(method_exists($controller, $url[1])){
	                    $controller->$url[1]();
	                }else{
	                    View::showError(404);
	            	}
                }else{
                    $controller->{Configuration::$DEF_METHOD}();
                }
            }


      	}  
        
	}

}