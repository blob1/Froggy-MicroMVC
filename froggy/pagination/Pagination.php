<?php

class Pagination {

	public static $rowCount;
	public static $perpage;
	public static $page;

	public static function make($data, $page, $perpage,$model=null){
		$start = $page*$perpage-$perpage;
		self::$rowCount = $model::rowCount();
		self::$perpage = $perpage;
		self::$page=$page;
		return $model::queryRaw($data." LIMIT ".$start.",".$perpage);
	}

	public static function links($show=false){
		$var=ceil(self::$rowCount/self::$perpage);
		if($var>1 || $show==true){
			$str='';
			for ($i=0; $i < $var; $i++) { 
				$ii=$i+1;
				$str.="<li><a href='".Path::base_path()."mahasiswa/".Configuration::$DEF_METHOD."/$ii'>$ii</a></li>\n";
			}

			if(self::$page!=1){
				$first="<li><a href='".Path::base_path()."mahasiswa/".Configuration::$DEF_METHOD."/1'><</a></li>";
			}else{
				$first="<li><a><</a></li>";
			}

			if(self::$page!=$var){
				$last="<li><a href='".Path::base_path()."mahasiswa/".Configuration::$DEF_METHOD."/".$var."'>></a></li>";
			}else{
				$last="<li><a>></a></li>";
			}

			echo "
			<ul>
				$first
				$str
				$last
			</ul>
			";
		}
	}
	
}