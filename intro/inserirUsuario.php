<?php

include_once('../configs/configurations.inc.php');
Seguranca::estaConectado();
$tabUsuario = new Usuario();


Template::gerarCabecalhoSite();

echo Template::inserirUsuario($tabUsuario,$_POST);
echo Template::gerarMenuAdmin();


echo Template::gerarRodape();


?>