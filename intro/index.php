<?php

include_once('../configs/configurations.inc.php');

$tabCategoria = new Categoria;
$tabLivro = new Livro;

//Template::enviareEmail('lala.txt');


Seguranca::estaConectado();

Template::gerarAdmin();
//Template::gerarSite();







?>