<?php

include_once('../configs/configurations.inc.php');
Seguranca::estaConectado();

$tabCategoria = new Categoria();


Template::gerarCabecalhoSite();

echo Template::inserirCategoria($tabCategoria, $_POST);
echo Template::gerarMenuAdmin();


echo Template::gerarRodape();



/*

if($_SERVER['REQUEST_METHOD'] == 'POST' AND isset($_POST['descricao']))
{
	//print_r($tabCategoria);
	//print_r($tabCategoria->inserir($_POST));
		
		//$descFilter = filter_input(INPUT_POST, $_POST['descricao'], FILTER_SANITIZE_SPECIAL_CHARS);
		
					
		$filtro = array('descricao' => array('filter' => FILTER_SANITIZE_STRING,
											 'flags'  => FILTER_FLAG_STRIP_LOW)
						);
							
		$dados = filter_input_array(INPUT_POST, $filtro);  							
	
		if($tabCategoria->inserir($dados))
		{
			echo '<h2> Registro Salvo</h2> <a href="index.php">Voltar</a>';
		}
		
		else
		{			
			echo "<h2> ERRO ao salvar Registro </h2>";
		}
}

else
{	static function gerarFormPOST($tabObj, $formact , $campos=false, $titulo=false);
	$campos = array('descricao');
	Template::gerarFormPOST($tabCategoria, 'inserirCategoria.php',  )

	<form action="inserirCategoria.php" method="post">
	Descrição: <input type="text" name="descricao" value=""/> <br/>
	<button type="submit">Salvar</button>
		
	</form>

	

}
*/

?>