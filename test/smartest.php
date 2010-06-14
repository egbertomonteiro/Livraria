<?php

// load Smarty library
require_once('../class/teste.class.php');

$smarty = new Smarty_Livraria();

       $smart->caching = true;

$smarty->assign('name','Ned');

$smarty->display('index.tpl');
?>