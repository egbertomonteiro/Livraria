<?php

include 'class/Carrinho.class.php';

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



$table = <<<FIM
<table border='1' align='center'>
  <tr>
    <td colspan='4'><h3 align='center'>CARRINHO DE COMPRAS</h3></td>
  </tr>
  <tr>
    <td>Nome</td><td>Descricao</td><td>Preco</td><td>Acao</td>
  </tr>
FIM;
echo $table;

foreach($carrinho->getFrom() as $pid=>$qtde )
{
	
	echo "<br>". 'Produtos: ' . $produtos[$pid] .'Qtde: ' . $qtde; 
	
}






?>
