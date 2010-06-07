<?php

/*
 * Logs Config
 */

define('LOG_FILE', '../logs/error.log');
$databaseDebug = false;
$DEBUG = array();

/*
 * DataBase Configs
 */

$dbconfig['driver'] = 'mysql';
$dbconfig['server'] = 'localhost';
$dbconfig['user'] = 'usuario';
$dbconfig['password'] = '123';
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
		
		// Se a classe não existir
		// Vai dar Pau!
		return false;
		
		}
		
		
		
			
		
	
?>