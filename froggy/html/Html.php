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
		foreach ($attr as $key => $value) {
			$var.="$key = \"$value\"";
		}

		echo "<input type=\"text\" name=\"".$name."\" value=\"".$value."\" ".$var." />";
	}

	public static function textarea($name,$value,$attr=array()){
		$var='';
		foreach ($attr as $key => $value) {
			$var.="$key = \"$value\"";
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
		foreach ($attr as $key => $value) {
			$var.="$key = \"$value\"";
		}

		echo "<input type=\"button\" name=\"".$name."\" value=\"".$value."\" ".$var." />";
	}

	public static function label($value,$attr){
		$var='';
		foreach ($attr as $key => $value) {
			$var.="$key = \"$value\"";
		}

		echo "<label>".$value."</label>";
	}

	public static function submit($value,$attr){
		$var='';
		foreach ($attr as $key => $value) {
			$var.="$key = \"$value\"";
		}

		echo "<input type=\"submit\" value=\"".$value."\" ".$var." />";
	}

	public static function form($action,$method,$attr){
		$var='';
		foreach ($attr as $key => $value) {
			$var.="$key = \"$value\"";
		}

		echo "<form action=".$action." method=".$method." ".$var." >";
	}

	public static function endForm(){
		echo "</form>";
	}

	public static function br(){
		echo "<br />";
	}

	public static function hr(){
		echo "<hr />";
	}
}