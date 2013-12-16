<?php

class HTML {

	public static function anchor($text,$link,$option=null){
		echo "<a href=\"".$link."\">".$text."</a>";
	}

	public static function doc(){
		echo "<!DOCTYPE html>\n";
	}

	public static function js($path){
		echo "<script src=\"".$path."\"></script>\n";
	}

	public static function css($path){
		echo "<link href=\"".$path."\" rel=\"stylesheet\" media=\"screen\">\n";
	}

	public static function meta($attr){
		$var='';
		foreach ($attr as $key => $value) {
			$var.="$key = \"$value\"";
		}
		echo "<meta $var />\n";
	}

	public static function textbox($name,$value,$attr=array()){

		$var='';
		foreach ($attr as $key => $val) {
			$var.="$key=\"$val\"";
		}

		echo "<input type=\"text\" name=\"".$name."\" value=\"".$value."\" ".$var." />";
	}

	public static function textarea($name,$value,$attr=array()){
		$var='';
		foreach ($attr as $key => $val) {
			$var.="$key = \"$val\"";
		}

		echo "<textarea name=\"".$name."\" ".$var." >".$value."</textarea>\n";
	}

	public static function combobox($name,$item=array(),$attr=array()){
		$var='';
		foreach ($attr as $key => $value) {
			$var.="$key = \"$value\"";
		}

		echo "<select name=\"".$name."\" ".$var.">\n";
		foreach ($item as $key => $value) {
			echo "<option value=\"".$value."\">".$key."</option>\n";
		}
		echo "</select>\n";

	}

	public static function button($name,$value,$attr=array()){
		$var='';
		foreach ($attr as $key => $val) {
			$var.="$key = \"$val\"";
		}

		echo "<input type=\"button\" name=\"".$name."\" value=\"".$value."\" ".$var." />";
	}

	public static function label($value,$attr=array()){
		$var='';
		foreach ($attr as $key => $val) {
			$var.="$key = \"$val\"";
		}

		echo "<label $var>".$value."</label>";
	}

	public static function submit($value,$attr=array()){
		$var='';
		foreach ($attr as $key => $val) {
			$var.="$key = \"$val\"";
		}

		echo "<input type=\"submit\" value=\"".$value."\" ".$var." />";
	}

	public static function reset($value,$attr=array()){
		$var='';
		foreach ($attr as $key => $val) {
			$var.="$key = \"$val\"";
		}

		echo "<input type=\"reset\" value=\"".$value."\" ".$var." />";
	}

	public static function input($type,$name,$value,$attr=array()){
		$var='';
		foreach ($attr as $key => $val) {
			$var.="$key = \"$val\"";
		}

		echo "<input type=\"$type\" name=\"$name\" value=\"".$value."\" ".$var." />";
	}

	public static function password($name,$value,$attr=array()){
		$var='';
		foreach ($attr as $key => $val) {
			$var.="$key = \"$val\"";
		}

		echo "<input type=\"password\" value=\"".$value."\" ".$var." />";
	}

	public static function form($action,$method,$attr=array()){
		$var='';
		foreach ($attr as $key => $value) {
			$var.="$key = \"$value\"";
		}

		echo "<form action=\"".$action."\" method=\"".$method."\"".$var.">";
	}

	public static function endForm(){
		echo "</form>";
	}

	public static function checkbox($name,$value=array(),$attr=array(),$order=false){

		$par='';
		if($order){
			$par='<br />';
		}
		
		foreach ($value as $keys => $val) {

			$var='';

			foreach ($attr as $key => $value) {
				$var.=$key." = \"$value\"";
			}

			echo "<input type=\"checkbox\" name=\"".$name."[]\" ".$var." />".$keys." ".$par;			
		}

	}

	public static function radio($name,$value=array(),$attr=array(),$order=false){
		$par='';
		if($order){
			$par='<br />';
		}
		
		foreach ($value as $keys => $val) {

			$var='';

			foreach ($attr as $key => $value) {
				$var.=$key." = \"".$value."\"";
			}

			echo "<input type=\"radio\" name=\"".$name."\" ".$var." />".$keys." ".$par;			
		}
	}

	public static function br(){
            echo "<br />";
    }

    public static function hr(){
            echo "<hr />";
    }

    public static function image($path,$width,$height,$attr=array()){
    	$var='';
		foreach ($attr as $key => $value) {
			$var.="$key = \"$value\"";
		}
    	echo "<img src=\"$path\" width=\"$width\" height=\"$height\" $var />\n";
    }

    public static function favicon($path){
    	echo "<link rel=\"shorcut icon\" href=\"$path>\"";
    }
}