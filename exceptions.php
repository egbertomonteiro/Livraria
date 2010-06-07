<?php



function Abra($teste = null)
{		
		if(!teste)
		{
			throw new Exception('Falta parametro com o nome do arquivo!' . "<br>"  );
		}
	
		if(!is_file($teste))
		{
			throw new Exception('Arquivo '. $teste . ' inexistente' . "<br>" );
		}	

		if(!file_get_contents($teste))
		{
			throw new Exception('Impossivel ler arquivo!' . "<br>" );
			
		}
		
		return $retorno;		
		
}

try
{
	$teste = 'arquivo.txt';
	Abra($teste);
	//echo $teste;
}

catch (Exception $excep)
{
	$mensagem = $excep->getMessage();
	
	error_log($mensagem, 3, "logs/error.log");
	
	
	echo $excep->getFile() . ' : ' . $excep->getLine() . ' : ' . $excep->getMessage();
	echo "<br> <br> <br>";
	echo $excep->getTrace();
	
	echo 'lala:' . $excep->getTrace();
	echo "</br>-----------------";

	$excep = $excep->getTrace();
	
	foreach($excep[0] as $chave=>$valor)
	{
		echo "<li> :" . $chave . ' : ' . $valor . "</li>";
		error_log($chave . ':' . $valor, 2, "logs/error.log");
		
	}

	
	
}



?>