<?php

class UsersModel extends FroggyDatabase{
	
	/*---------------------------------------------------
	| The database Table that used by Model
	---------------------------------------------------
	*/

	public static $table = 'users';

	/*---------------------------------------------------
	| The Primary Key of Table above
	---------------------------------------------------
	*/

	public static $primaryKey='id';

	/*---------------------------------------------------
	| Fields of Table
	---------------------------------------------------
	*/

	public static $field = array('id','username','password','status');

}