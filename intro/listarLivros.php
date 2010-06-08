<?php

include_once('../configs/configurations.inc.php');

echo '<h2> Listar Livros</h2>';

$tabLivro = new Livro();

$livros = $tabLivro->listar();
//$livroscatid = $tabLivro->listarPorCatID(1);

$campos = array('id','isbn','autor','titulo');

echo Template::gerarTabela($tabLivro,$livros);

echo Template::gerarTabela($tabLivro,$livros,$campos);

//echo Template::gerarTabela($tabLivro,$livroscatid,$campos);
//print_r($livros);
//print_r($livroscatid->fetchObject());

?>