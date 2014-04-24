<?php

class Generators {

	public static function make($table,$field=array()){

		self::table($table,$field);
		self::model($table,$field);
		self::controller($table,$field);
		self::view($table,$field);

	}

	public static function table($name,$field=array()){

		$var='';
		foreach ($field as $key => $value) {
			$var.="$key $value,";
		}
		
		ModelGen::queryRaw("CREATE TABLE ".$name."(".rtrim($var,",").") ENGINE=InnoDB DEFAULT CHARSET=latin1;");

	}

	public static function controller($class,$field=array()){

		$var=$role='';
		foreach ($field as $key => $value) {
			$var.="'".$key."'=>Input::get('".$key."'),";
			$role.="'".$key."'=> 'max=5|required',";
		}

		$file = fopen("app/Controllers/".ucfirst($class).".php","w");
		fwrite($file,'
<?php
	class '.ucfirst($class).' extends FroggyController {

		public function index(){

			$data[\'items\']='.ucfirst($class).'Model::queryRaw(\'SELECT * FROM '.$class.' \');

			return View::make(\''.$class.'/index\',$data);
		}

		public function insert(){

			$data=array('.rtrim($var,",").');

			$role=array('.rtrim($role,",").');

			if(Validate::check($data,$role)){

				'.ucfirst($class).'Model::insert($data);

				return Redirect::to(\''.$class.'/index\',\'Row Inserted\');

			}else{

				return Redirect::to(\''.$class.'/add\');
			}
			
		}

		public function add(){

			return View::make(\''.$class.'/add\');

		}

		public function update($id){

			$data=array('.rtrim($var,",").');

			$role=array('.rtrim($role,",").');

			if(Validate::check($data,$role)){

				'.ucfirst($class).'Model::update($data,"id=\'$id\'");

				return Redirect::to(\''.$class.'/index\',\'Row Updated\');

			}else{

				return Redirect::to(\''.$class.'/edit/$id\');

			}

		}

		public function edit($id){

			$data[\'items\']='.ucfirst($class).'Model::queryRaw("SELECT * FROM '.ucfirst($class).' WHERE id=\'$id\' ");

			return View::make(\''.$class.'/edit\',$data);

		}

		public function delete($id){

			'.ucfirst($class).'Model::delete("id=\'$id\'");

			return Redirect::to(\''.$class.'/index\',\'Row Deleted\');

		}

	}
		');
		fclose($file);
	}

	public static function model($class,$field=array(),$primary='id'){
		$var='';

		foreach ($field as $key=>$value) {
			$var .= "'$key',";
		}

		$file = fopen("app/Models/".ucfirst($class)."Model.php","w");
		fwrite($file,'
<?php
	class '.ucfirst($class).'Model extends FroggyDatabase {

		public static $table = \''.$class.'\';

		public static $field = array('.rtrim($var,",").');

		public static $primaryKey=\''.$primary.'\';

	}
		');
		fclose($file);
	}

}
