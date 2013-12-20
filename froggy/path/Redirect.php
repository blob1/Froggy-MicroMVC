<?php

class Redirect {
	public static function to($link,$msg=array()){
		foreach ($msg as $key => $value) {
			Session::set($key,$value);
		}
		echo "<meta http-equiv=\"refresh\" content=\"0;URL=".Path::to_path().$link."\">";

	}

	public static function toWhen($link,$time){
		echo "<meta http-equiv=\"refresh\" content=\"".$time.";URL=".Path::to_path().$link."\">";
	}
}