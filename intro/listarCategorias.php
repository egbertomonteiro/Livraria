<?php

include_once('../configs/configurations.inc.php');


$tabCategoria = new Categoria();

$livros = $tabCategoria->listar();
Template::gerarCabecalhoSite();
//$livroscatid = $tabCategoria->listarPorCatID(1);



//$campos = array('id','isbn','autor','titulo');

echo Template::gerarTabela($tabCategoria,$livros);
echo Template::gerarMenuAdmin();

//echo Template::gerarTabela($tabCategoria,$livros,$campos);

//echo Template::gerarTabela($tabLivro,$livroscatid,$campos);
//print_r($livros);
//print_r($livroscatid->fetchObject());
echo Template::gerarRodape();


?>