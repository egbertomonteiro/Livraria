<?php

class Template{
	
	private $code;

	static private function pegarArquivo($arquivo, $parametros=array())
	{
		try
		{
			$dir = 'SITE_PATH' . 'TEMPLATE_DIR';  
			
			$arquivo = str_replace(
									array('\\','/','..','<','>'),
									array('','','','',''),
									$arquivo							
									
									);
			// troquei file_exists por
			// is_file
			// file_exists pode pegar um diretorio tb! =S
			//php.net: 
			// Returns TRUE if the file or directory specified by filename exists; FALSE otherwise.									
			if(!is_file($dir.$arquivo))
			{
					throw new Exception("Template $arquivo não existe");
			}
			else
			{
				$conteudo = file_get_contents($dir . $arquivo);
				
				if(!is_array($parametros))
				{
					throw new Exception('Esperado um Array para inserir registro');
				}
			}
			foreach($parametros as $chave => $valor)
			{
				$de = $chave;
				$para[] = $valor;
			}						
			
			// La em cima ja tinha declarao $conteudo e agora
			// ta passando $conteudo como um parametro! =O
			$conteudo = str_replace($de, $para, $conteudo);
			
			return $conteudo;
									
		}
		catch(Exception $e)
		{
			$erro = '<h1> Erro: </h1> <pre>' . $e->getMessage() . "\n" .
					$e->getTraceAsString() . '</pre>' . "\n";

			error_log(date('d-m-Y H:i:s') . " - " . $erro, 3, 'LOG_FILE');
			
			//"exit" mostrando $erro
			die($erro);
		}
	}
	
	
	static public function exibirArquivo($arquivo, $parametros=array())
	{
		echo self::pegarArquivo($arquivo, $parametros);
	}
	
	
	
	static public function gerarCabecalhoAdmin()
	{
		$arquivo = 'cabecalhoAdmin.html';
		$parametros = array();
		self::exibirArquivo($arquivo,$parametros);
	}
	
	
	static public function gerarCabecalhoSite()
	{
		$arquivo = 'gerarCabecalho.html';
		$parametros = array('%CARRINHO_TOTAL_ITENS%'=>$_SESSION['itens'],
							'%CARRINHO_VALOR_TOTAL%'=>number_format($_SESSION['total'], 2, ',', '.')
		
							);
		self::exibirArquivo($arquivo,$parametros);
	}
	
	static public function gerarRodape()
	{
		$arquivo = 'rodape.html';
		$parametros = array(
							'%DEBUG%'=>self::debug()
							);
		self::exibirArquivo($arquivo,$parametros);
							
	}
	
	static function gerarTabela($tabObj, $tabResult, $campos=false)
	{
		$conteudo = '
					<table border="1">
						<tr>
							<th> Ações </th>
					';
		if($campos)
		{
			foreach ($campos as $campos)
			{
				$conteudo .= '<th>' . $tabObj->legendas[$campo] . '</th>'; 
			}
		}
		else
		{
			foreach($tabObj->legendas as $campo)
			{
				$conteudo .= '<th>' . $campo . '</th>';
			}
		}
	
		$conteudo .= '</tr>';
		
		while($tabLinha = $tabResult->fetch(PDO::FETCH_ASSOC))
		{
			$conteudo .= '
				<tr>
				<td>
				<a href="' . $tabObj->tabela . 'Editar.php?' . $tabObj->chavePrimaria . "=" . $tabLinha[$tabObj->chavePrimaria] . '">
				<img src= ".. /imagens/editar.png" alt="editar" title="Editar"></a>
				<a href="' . $tab0bj->tabela . 'Excluir.php?' . $tabObj->chavePrimaria . "=" . $tabLinha[$tabObj->chavePrimaria]. '">
				<img src="../imagens/excluir.png" alt="excluir" title="E×cluir"></a>
				</td>
				';

		
		
		
		
		
			if ($campos) 
			{
				
			// Varrendo a lista de Campos enviada
			foreach ($campos as $campo) 
				{
								// Montando valores com
								// as informaeées do array com Campos
								$conteudo .= '<td>' . $tabLinha[$campo] . '</td>';
			
				}
			
			} 
			
			else 
			{
				// Nao foi enviada lista de Campos
				// Varrendo as Campos do registro
				foreach ($tabLinha as $campo => $valor) 
				{
					// Montando Valores
					$conteudo .= '<td>' . $valor . '</td>';
				}
			
			}
			
			// Finalizando Zinha
			$conteudo .= '</tr>';
			
		} // finaliza while
			
			// Finalizando tabela
			$conteudo .= '</table>';
			
			return $conteudo;
	
		
		
}
	
	
	
	
	/*
	 * 
	 * METOD.OS ANTIGOS!
	 * 
	 */
	public function build($search, $value, $html)
	{
		$file = file_get_contents($html);
		//print_r($file);
		$this->code = str_replace($search,$value,$file);
	}
	
	public function render()
	{
		echo $this->code;
	
	}	
			
	public function __toString()
	{
		return $this->code;
	}
	
}


?>