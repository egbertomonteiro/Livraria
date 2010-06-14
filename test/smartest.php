<?php

// load Smarty library
require_once('../configs/configurations.inc.php');

$smarty = new Smarty();

$smarty->template_dir = '/var/www/workspace/Livraria/smarty/livraria/templates/';
$smarty->compile_dir = '/var/www/workspace/Livraria/smarty/livraria/templates_c/';
$smarty->config_dir = '/var/www/workspace/Livraria/smarty/livraria/configs/';
$smarty->cache_dir = '/var/www/workspace/Livraria/smarty/livraria/cache/';

$smarty->assign('name','Ned');

$smarty->display('index.tpl');
?>