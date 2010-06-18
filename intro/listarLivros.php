<?php

include_once('../configs/configurations.inc.php');
Seguranca::estaConectado();
Template::gerarCabecalhoSite();



$tabLivro = new Livro();

$livros = $tabLivro->listar();

//$livroscatid = $tabLivro->listarPorCatID(1);


//Template::gerarSite(listarLivros.php);

//Template::gerar
//$campos = array('id','isbn','autor','titulo');

echo Template::gerarTabela($tabLivro,$livros);

echo Template::gerarMenuAdmin();

//echo Template::gerarTabela($tabLivro,$livros,$campos);

//echo Template::gerarTabela($tabLivro,$livroscatid,$campos);
//print_r($livros);
//print_r($livroscatid->fetchObject());

echo Template::gerarRodape();


?>