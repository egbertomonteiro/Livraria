<?php

include_once('../configs/configurations.inc.php');

echo '<h2> Listar Categoria </h2>';

$tabCategoria = new Categoria();

$livros = $tabCategoria->listar();
$livroscatid = $tabCategoria->listarPorCatID(1);

$campos = array('id','isbn','autor','titulo');

echo Template::gerarTabela($tabCategoria,$livros);

echo Template::gerarTabela($tabCategoria,$livros,$campos);

//echo Template::gerarTabela($tabLivro,$livroscatid,$campos);
//print_r($livros);
//print_r($livroscatid->fetchObject());

?>