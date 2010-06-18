<?php
include_once('../configs/configurations.inc.php');
Seguranca::estaConectado();
$tabCategoria = new Categoria();

if(isset($_GET['id']) AND isset($_GET['ok']))
{
	//print_r($_GET['id']);
	//print_r($_GET['ok']);
	
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
	<h3> ' . $categoria->id . ' - ' . $categoria->descricao . '</h3>
	<a href="index.php">Não</a>
	<a href="excluirCategoria.php?id=' . $categoria->id . '&ok=1">SIM</a>
	
	';
}


?>

