<?php

include_once('../configs/configurations.inc.php');

$tabLivro = new Livro();

if($_SERVER['REQUEST_METHOD'] == 'POST' AND isset($_POST['isbn']))
{
	//print_r($tabLivro);
	//print_r($tabLivro->inserir($_POST));
		
		//$descFilter = filter_input(INPUT_POST, $_POST['descricao'], FILTER_SANITIZE_SPECIAL_CHARS);
		echo 123;
					
		$filtro = array(
						'isbn'   	=> array('filter' => FILTER_SANITIZE_NUMBER_INT, FILTER_NULL_ON_FAILURE),
						'autor'  	=> array('filter' => FILTER_SANITIZE_STRING,
									     'flags'   => FILTER_FLAG_STRIP_LOW),
						'titulo'    => array('filter' => FILTER_SANITIZE_STRING,
										 'flags'   => FILTER_FLAG_STRIP_LOW),
						'cat_id' => array('filter' => FILTER_SANITIZE_NUMBER_INT,
										 'flags'   => FILTER_FLAG_STRIP_LOW),	
						'preco' 	=> array('filter' => FILTER_SANITIZE_NUMBER_FLOAT,
										 'flags' => FILTER_FLAG_ALLOW_FRACTION | FILTER_FLAG_ALLOW_THOUSAND),

						'sumario'	=> array('filter' => FILTER_SANITIZE_STRING,
										 'flags'   => FILTER_FLAG_STRIP_LOW),								
		
						);
		try
		{
			
		
								
				$dados = filter_input_array(INPUT_POST, $filtro); 
				//print_r($dados); 							
			
				if($tabLivro->inserir($dados))
				{ 
					echo '<h2> Registro Salvo</h2> <a href="index.php">Voltar</a>';
				}
				else
				{		
					echo "<h2> ERRO ao salvar Registro </h2>";
					unset($_POST['isbn']);
				}
					
		}
		
		catch(Exception $e)
		{		
				$erro = 'Erro: ' . $e->getMessage() ."\n" . $e->getTraceAsString() . "\n";
				error_log(date('d-m-Y H:i:s') . '-' . $erro, 3, LOG_FILE);
				die($erro);
		}
		
	
}

else
{
	?>
	<form action="inserirLivro.php" method="post">
	ISBN: <input type="text" name="isbn" value=""/> <br/>
	Autor: <input type="text" name="autor" value=""/> <br/>
	Titulo: <input type="text" name="titulo" value=""/> <br/>
	Categoria: <input type="text" name="cat_id" value=""/> <br/>
	Preço: <input type="text" name="preco" value=""/> <br/>
	Sumario: <input type="text" name="sumario" value=""/> <br/>
	
	
	<button type="submit">Salvar</button>
		
	</form>
	
	<?php 
}

?>