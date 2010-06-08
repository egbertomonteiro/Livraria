<?php

include_once('../configs/configurations.inc.php');

$tabLivro = new Livro();

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id']))
{
	$id = $_POST['id'];
	
	if($tabLivro->atualizar($id, $_POST))
	{
		echo "<h2> Registro Salvo </h2>";
	}
	
	else
	{
		echo "<h2> Erro ao salvar </h2> ";
	}
	
}
	else 
	{
		$id = $_GET['id'];		
	}

	echo '<a href="index.php"> Voltar </a>';
	
	$registro = $tabLivro->listartPorChave($id);
	
	//RETIRANDO ID do array
	//PQ ID não eh editavel
	// PORRA $registro eh um objeto! =S N DEU CERTO
	//$registro = array_slice($registro, 1);
	//print_r($registro);
	
	
	echo '
	<form action="editarCategoria.php" method="post" >';
		

	
foreach($registro as $campo => $valor)
{
	echo $tabLivro->legendas[$campo] . ': ' .
		 '<input type="text" name="'. $campo .'"' . 
		 'value="'. $valor .'" /></br>' . "\n";
}
	
echo '<button type="submit">Salvar</button> </form>';


?>