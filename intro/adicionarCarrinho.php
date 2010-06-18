<?php

include '../configs/configurations.inc.php';
Seguranca::estaConectado();
session_start();

$carrinho = new Carrinho();

$carrinho->addTo($_GET['pid'],$_GET['qtde']);

//$produtos=array(
//0 = 'produto 1';
//1 = 'produto 2';
//2 = 'produto 3';
//);

//$produtos = array();
$produtos[1] = 'teste';
$produtos[2] = 'lala';
$produtos[3] = 'dfda';




?>



