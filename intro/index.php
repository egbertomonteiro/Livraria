<?php

include_once('../configs/configurations.inc.php');
Seguranca::estaConectado();
$tabCategoria = new Categoria;
$tabLivro = new Livro;

//Template::enviareEmail('lala.txt');



Seguranca::estaConectado();
print_r($_SESSION);
Template::gerarAdmin();
//Template::gerarSite();







?>