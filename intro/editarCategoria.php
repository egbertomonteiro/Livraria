<?php

include_once('../configs/configuration.inc.php');

$tabCategoria = new Categoria();

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id']))
{
	$id = $_POST['id'];
	
	if($tabCategoria->atualizar($id, $_POST))
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
	
	$registro = $tabCategoria->listartPorChave($id);
	
	echo '
	<form action="editarCategoria.php" method="post" >';
		
	
foreach($registro as $campo => $valor)
{
	echo $tabCategoria->legendas[$campo] . ': ' .
		 '<input type="text" name="'. $campo .'"' . 
		 'value="'. $valor .'" /></br>' . "\n";
}
	
echo '<button type="submit">Salvar</button> </form>';


?>