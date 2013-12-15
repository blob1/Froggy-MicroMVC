<?php

class Auth {

	public static function attempt($user,$pass){
		require 'app/Config/auth.php';

		if(UsersModel::isHas('username',$user) && UsersModel::isHas('username',$pass)){
			Session::set('FroggyUsers',UsersModel::getByField('id',"WHERE username = '".$user."'"));
			return true;
		}else{
			return false;
		}

	}

	public static function get($field){
		if(self::check()){
			return UsersModel::getByField($field,"WHERE `id` = '".Session::get('FroggyUsers')."'");
		}else{
			return 'Field Not Found';
		}
	}

	public static function check(){
		if(Session::has('FroggyUsers')){
			return true;
		}else{
			return false;
		}
	}

	public static function logout(){
		Session::destroy('FroggyUsers');
	}

}