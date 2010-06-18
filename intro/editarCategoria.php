<?php

include_once('../configs/configurations.inc.php');
Seguranca::estaConectado();
$tabCategoria = new Categoria();



if((isset($_POST['id']) AND is_numeric($_POST['id'])) OR (isset($_GET['id']) AND is_numeric($_GET['id'])))

{

	try
	{

					if($_SERVER['REQUEST_METHOD'] == 'POST' AND isset($_POST['id']))
					{
						$id = $_POST['id'];
						
											
						//print_r($_POST . 'POST');
						$filtro = array(
										'descricao' => array('filter' => FILTER_SANITIZE_STRING, FILTER_SANITIZE_SPECIAL_CHARS,
											 				 'flags'  => FILTER_FLAG_STRIP_LOW),
										'tipo'		=> array('filter' => FILTER_SANITIZE_STRING,
											 			     'flags'  => FILTER_FLAG_STRIP_LOW)
										);
						
						
						$dados = filter_input_array(INPUT_POST, $filtro);  
						//print_r($dados . 'DADOS');
						
						
						if($tabCategoria->atualizar($id, $dados))
						{
							//print_r($_POST);
							echo "<h2> Registro Salvo </h2>";
						}
						
						else
						{
							echo "<h2> Erro ao salvar </h2> ";
						}
						
					}
					else 
						{
							if(is_numeric($_GET['id']))
							{
								$id = $_GET['id'];	
							
							}	
						}
			
				echo '<a href="index.php"> Voltar </a>';
				
				
				/*
				 * SE o ID passado não existir Não FAÇA NADA! =D
				 */
				if($registro = $tabCategoria->listartPorChave($id))
				{
				
						//RETIRANDO ID do array
						//PQ ID não eh editavel
						// PORRA $registro eh um objeto! =S N DEU CERTO
						//$registro = array_slice($registro, 1);
						//print_r($registro);
						
						
						echo '<form action="editarCategoria.php" method="post" >';
							
					
						
							foreach($registro as $campo => $valor)
							{
								echo $tabCategoria->legendas[$campo] . ': ' .
								 '<input type="text" name="'. $campo .'"' . 
								 'value="'. $valor .'" /></br>' . "\n";
							}
						echo '<button type="submit">Salvar</button> </form>';
				}
	
	}
	
	catch(Exception $e)
	{
		$erro = 'Erro: ' . $e->getMessage() ."\n" . $e->getTraceAsString() . "\n";
		error_log(date('d-m-Y H:i:s') . '-' . $erro, 3, LOG_FILE);
		die($erro);
			
	}
	


}// FIM DO IF

/*
 * Se o ID não for numerico e tb se não estiver setado ou não existir
 * Aparece só a opção de voltar! 
 */
else

{
		echo '<a href="index.php"> Voltar </a>';
	
}


?>