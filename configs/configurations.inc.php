<?php
/*
 * Path's
 */

define('SITE_PATH', '/var/www/workspace/Livraria/');
define('TEMPLATES_DIR', 'template/');
define('IMAGES_DIR', 'images/');
define('_XML_DB_','../configs/configurations.xml');
define('SMARTY_DIR', '/var/www/workspace/Livraria/smarty/libs/');
define('SMARTY_CACHE_DIR', '/var/www/workspace/Livraria/smarty/livraria/cache');



/*
 * Logs Config
 */

define('LOG_FILE', '../logs/error.log');

/*
 * DEBUG
 */
$debug = true;
$databaseDebug = true;
$DEBUG = array();

/*
 * DataBase Configs
 */

$dbconfig['driver'] = 'mysql';
$dbconfig['server'] = 'localhost';
$dbconfig['user'] = 'livraria_user';
$dbconfig['password'] = '123456';
$dbconfig['database'] = 'livraria';
$dbconfig['options'] = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");

/*
 * 	AUTOLOAD
		
 */
		function __autoload($ClassName)
		{
			if(is_file('../class/' . "{$ClassName}" . '.class.php'))
			{
				require_once '../class/' . "{$ClassName}" . '.class.php';
				return true;
				
			}

			return false;
		
		}
		
		
			
		
	
?>