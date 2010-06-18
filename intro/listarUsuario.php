<?php

include_once('../configs/configurations.inc.php');
Seguranca::estaConectado();

$tabUsuario = new Usuario();
$usuarios = $tabUsuario->listar();

Template::gerarCabecalhoSite();

$campos = array('id','username','last_login','is_active', 'is_super_admin');
echo Template::gerarTabela($tabUsuario,$usuarios,$campos);

echo Template::gerarMenuAdmin();
echo Template::gerarRodape();


?>