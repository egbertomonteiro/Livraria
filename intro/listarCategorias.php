<?php

include_once('../configs/configurations.inc.php');
Seguranca::estaConectado();

$tabCategoria = new Categoria();

$categorias = $tabCategoria->listar();
Template::gerarCabecalhoSite();


//$campos = array('id','isbn','autor','titulo');

echo Template::gerarTabela($tabCategoria,$categorias);
echo Template::gerarMenuAdmin();

echo Template::gerarRodape();


?>