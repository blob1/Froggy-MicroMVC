<?php

class Configuration {

	/*---------------------------------------------------
	| Base path of your project 
	---------------------------------------------------
	*/

	public static $BASE_PATH = "http://localhost:85/simpleMVC/";

	/*---------------------------------------------------
	| Default controller for '/' (without quotes)
	---------------------------------------------------
	*/

	public static $DEF_CONTROLLER = 'HelloController';

	/*---------------------------------------------------
	| Default method for all controller 
	---------------------------------------------------
	*/

	public static $DEF_METHOD = 'index';

	/*---------------------------------------------------
	| Database configuration  
	---------------------------------------------------
	*/	

	public static $DBTYPE = 'mysql';
	public static $HOSTNAME = '127.0.0.1';
	public static $USERNAME = 'root';
	public static $PASSWORD = '';
	public static $DATABASE = 'dbname';

	/*---------------------------------------------------
	| Security code for generate hash 
	---------------------------------------------------
	*/

	public static $SECURITYKEY = 'SecretCode';


}