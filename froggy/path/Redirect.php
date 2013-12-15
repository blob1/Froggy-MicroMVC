<?php

class Redirect {
	public static function to($link){
		echo "<meta http-equive=\"\" content=\"0;URL=".$link."\">";
	}

	public static function toWhen($link,$time){
		echo "<meta http-equive=\"\" content=\"".$time.";URL=".$link."\">";
	}
}