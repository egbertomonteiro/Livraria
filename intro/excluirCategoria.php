<?php
include_once('../configs/configuration.inc.php');

$tabCategoria = new Categoria();

if($_GET['id'] AND $_GET['ok'])
{
	if($tabCategoria->excluir($_GET['id']))
	{
		echo '<h2> Categoria excluida com sucesso </h2> <a href="index.php">Voltar</a>';
	}

	else
	{
		echo '<h2>ERRO! Exclusão Não Efetuada!</h2> <a href="index.php">Voltar</a>';
		
	}
}
else
{
	$categoria = $tabCategoria->listartPorChave($_GET['id']);
	
	echo '
	<h2> Confirma exclusão da categoria? </h2>
	<h3> ' . $categoria->id . ' - ' . $categoria->descriacao . '</h3>
	<a href="index.php">Não</a>
	<a href="excluirCategoria.php?id=' . $categoria->id . '&ok=1">SIM</a>
	
	';
}


?>

