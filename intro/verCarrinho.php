<?php

include '../configs/configurations.inc.php';
Seguranca::estaConectado();
//require_once(SMARTY_DIR . 'Smarty.class.php');

session_start();

/*
 * TTODOS os locais/scripts que eu for acessar um Objeto
 * eu preciso instancia-lo, neste caso $carrinhoXYZ esta 
 * pegando as variaveis da sessao, isto 'e definido no Carrinho.class
 */

$carrinhoXYZ = new Carrinho();
$tabLivro = new Livro();
//$smarty = new Smarty();

$table = <<<FIM
<table border='1' align='center'>
  <tr>
    <td colspan='4'><h3 align='center'>CARRINHO DE COMPRAS</h3></td>
  </tr>
  <tr>
    <td>Quantidade</td><td>Produto</td><td>Nome</td><td>Descricao</td><td>Preco</td><td>Acao</td>
  </tr>
FIM;
#echo $table;
foreach($_SESSION['produtos'] as $pid=>$qtde)
{
	if($pid!='')
	{

		$camposDoLivro = $tabLivro->listartPorChave($pid);
					
			echo 'Quantidade: ' . $qtde . ' Titulo: ' . $camposDoLivro->titulo . ' Preço: ' . $camposDoLivro->preco . "<br/>"; 
			//echo $camposDoLivro->titulo . "<br/>";
			//echo 'Quantidade:' . $qtde . ' ' . "<br/>";
			
			//echo $
			
		
			//$smarty->template_dir = '/var/www/workspace/Livraria/smarty/livraria/templates1/';
			
			//print_r($smarty);
			
			
			
			/*
			 * 
			 */

			

			
			//	echo $tabLivro->legendas[$pid] . ': ' .
			//	 '<input type="text" name="'. $qtde .'"' . 
			//	 'value="'. $pid .'" /></br>' . "\n";
			
			//echo "<br>". 'Produtos: ' . $produtos[$pid] .'Qtde: ' . $qtde; 
	}
	
}


?>



