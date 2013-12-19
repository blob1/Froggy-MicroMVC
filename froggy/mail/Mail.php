<?php

class Mail {

	public static function verify($field){
	    $field=filter_var($field, FILTER_SANITIZE_EMAIL);
	    if($field){
	    	return TRUE;
	    }else{
	    	return FALSE;
	    }
	}

	public static function send($from, $destination=array(),$subject,$text){
		$to='';
		foreach ($destination as $key) {
			if(self::verify($key)){
				$to.="$key,";
			}
		}
		
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
		$headers .= 'From: <$from>' . "\r\n";

	    mail($to, $subject, $text, $headers );
	}

}