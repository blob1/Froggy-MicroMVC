<?php

class FroggyDatabase {

	public static $table;
	public static $primaryKey;
	public static $field;

	function con(){
		return $db = new PDO(Configuration::$DBTYPE.':host='.Configuration::$HOSTNAME.';dbname='.Configuration::$DATABASE,Configuration::$USERNAME,Configuration::$PASSWORD);
	}

	public static function query($condition,$by=null,$order='asc',$limit=100,$start=0){
		$db = FroggyDatabase::con();
		$class=get_called_class();
		$var='';
		foreach ($condition as $key) {
			$var.="`".$key."`,";
		}

		if($by==null){
			$by = $class::$primaryKey;
		}

		$st=$db->query("SELECT ".rtrim($var,",")." FROM `".$class::$table."` ORDER BY `".$by."` ".$order." LIMIT ".$start.",".$limit);

		$error = $db->errorInfo();
		echo $error[2];

		return $st->fetchAll();
	}

	public static function queryRaw($condition){
		$db = FroggyDatabase::con();
		$class=get_called_class();
	
		$st=$db->query($condition);

		$error = $db->errorInfo();
		echo $error[2];

		return $st->fetchAll();
	}

	public static function queryOne($val,$field='id'){
		$db = FroggyDatabase::con();
		$class=get_called_class();
	
		$st=$db->query("SELECT * FROM `".$class::$table."` WHERE `$field`='$val' ");

		$error = $db->errorInfo();
		echo $error[2];

		return $st->fetchAll();
	}

	public static function insert($data){
		$db = FroggyDatabase::con();
		$class=get_called_class();

		$field=$class::$field;
		$var=$value=$exec='';
		$val=array();
		foreach ($data as $key => $valu) {
			$val[]=$valu;
		}

		for ($i=0; $i < COUNT($field); $i++) { 
			$var.="`".$field[$i]."`,";
			$value.=":test".($i+1).",";
			$exec[":test".($i+1)]=$val[$i];
		}

		$st=$db->prepare("INSERT INTO `".$class::$table."`(".rtrim($var,',').") VALUES(".rtrim($value,",").")");
		$st->execute($exec);

		$error = $db->errorInfo();
		echo $error[2];

	}

	public static function update($data,$condition){
		$db = FroggyDatabase::con();
		$class=get_called_class();

		$field=$class::$field;
		$var=$value=$exec='';

		$val=array();
		foreach ($data as $key => $valu) {
			$val[]=$valu;
		}

		for ($i=0; $i < COUNT($field); $i++) { 
			if($field[$i]!=$class::$primaryKey){
				$var.="`".$field[$i]."` = :test".($i).",";
				$exec[":test".($i)]=$val[$i-1];
			}
			
		}

		$st=$db->prepare("UPDATE `".$class::$table."` SET ".rtrim($var,",")." WHERE ".$condition);
		$st->execute($exec);

		$error = $db->errorInfo();
		echo $error[2];
		
	}

	public static function delete($condition){
		$db = FroggyDatabase::con();
		$class=get_called_class();

		$st=$db->prepare("DELETE FROM `".$class::$table."` WHERE ".$condition);
		$st->execute();

		$error = $db->errorInfo();
		echo $error[2];
	}

	public static function rowCount(){
		$db = FroggyDatabase::con();
		$class=get_called_class();

		$st=$db->query("SELECT COUNT(`".$class::$primaryKey."`) as total FROM `".$class::$table."`");

		$error = $db->errorInfo();
		echo $error[2];
		$var = $st->fetchAll();

		return $var['0']['total'];
	}

	public static function rowCountRaw($table){
		$db = FroggyDatabase::con();
		$class=get_called_class();

		$st=$db->query("SELECT COUNT(*) as total FROM `".$table."`");

		$error = $db->errorInfo();
		echo $error[2];
		$var = $st->fetchAll();

		return $var['0']['total'];
	}

	public static function plusOne($field,$condition){
		$db = FroggyDatabase::con();
		$class=get_called_class();

		$st=$db->exec("UPDATE `".$class::$table."` SET `".$field."`= `".$field."`+1 WHERE ".$condition);

		$error = $db->errorInfo();
		echo $error[2];

	}

	public static function plusRaw($table,$field,$plus,$condition){
		$db = FroggyDatabase::con();
		$class=get_called_class();

		$st=$db->exec("UPDATE `".$table."` SET `".$field."`= `".$field."`+".$plus." WHERE ".$condition);

		$error = $db->errorInfo();
		echo $error[2];
	}

	public static function isHas($field,$value){
		$db = FroggyDatabase::con();
		$class=get_called_class();

		$st=$db->query("SELECT COUNT(`".$field."`) as total FROM `".$class::$table."` WHERE `".$field."`='".$value."'");

		$error = $db->errorInfo();
		echo $error[2];
		$var = $st->fetchAll();

		if($var['0']['total']>0){
			return true;
		}else{
			return false;
		}

	}

}