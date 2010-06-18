<?php

include_once('../configs/configurations.inc.php');
Seguranca::estaConectado();
$tabLivro = new Livro();


Template::gerarCabecalhoSite();

echo Template::inserirLivro($tabLivro,$_POST);
echo Template::gerarMenuAdmin();


echo Template::gerarRodape();


?>