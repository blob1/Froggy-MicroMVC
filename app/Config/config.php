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

	/*---------------------------------------------------
	| Library that used in this project 
	---------------------------------------------------
	*/

	public static $providers = array(

		'froggy/auth/Auth.php',
		'froggy/bootstrap/Bootstrap.php',
		'froggy/controller/Controller.php',
		'froggy/cookies/Cookies.php',
		'froggy/database/Database.php',
		'froggy/generator/Generator.php',
		'froggy/generator/ModelGen.php',
		'froggy/hash/Hash.php',
		'froggy/html/Html.php',
		'froggy/input/Input.php',
		'froggy/mail/Mail.php',
		'froggy/pagination/Pagination.php',
		'froggy/path/Path.php',
		'froggy/path/Redirect.php',
		'froggy/session/Session.php',
		'froggy/upload/Upload.php',
		'froggy/validate/Validate.php',
		'froggy/view/View.php'

	);

}