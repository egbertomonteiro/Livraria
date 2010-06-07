<?php

include_once('../configs/configuration.inc.php');

$tabCategoria = new Categoria();

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['descricao']))
{
	if($tabCategoria->inserir($_POST))
	{
		echo '<h2> Registro Salvo</h2> <a href="index.php">Voltar</a>';
	}
	
	else
	{
		echo "<h2> ERRO ao salvar Registro </h2>";
	}
}

else
{
	?>
	<form action="inserirCategoria.php" method="post">
	Descrição: <input type="text" name="descricao" value=""/> <br/>
	<button type="submit">Salvar</button>
		
	</form>
	
	<?php 
}

?>