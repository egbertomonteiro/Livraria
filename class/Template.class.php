<?php

class Template{
	
	private $code;
	
	static public function enviareEmail($body)
	{
		
	
try {
	$mail = new PHPMailer(true); //New instance, with exceptions enabled

	$body             = file_get_contents($body);

	$body             = preg_replace('/\\\\/','', $body); //Strip backslashes

	$mail->IsSMTP();                           // tell the class to use SMTP
	$mail->SMTPAuth   = true;                  // enable SMTP authentication
	$mail->Port       = 587;                    // set the SMTP server port
	$mail->Host       = "smtp.googlemail.com"; // SMTP server
	$mail->Username   = "";     // SMTP server username
	$mail->Password   = "";            // SMTP server password

	$mail->IsSendmail();  // tell the class to use Sendmail

	$mail->AddReplyTo("","Egberto Monteiro");

	$mail->From       = "";
	$mail->FromName   = "Egberto Monteiro";

	$to = "";

	$mail->AddAddress($to);

	$mail->Subject  = "First PHPMailer Message";

	$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
	$mail->WordWrap   = 80; // set word wrap

	$mail->MsgHTML($body);

	$mail->IsHTML(true); // send as HTML

	$mail->Send();
	echo 'Message has been sent.';
	} catch (phpmailerException $e) {
	echo $e->errorMessage();
	}
}


/*
 * 
 *  <dl>
	<dt> <a href="#livros"> Livros </a></dt>
	<dd>
	<ul>
		<li><a href="listarLivros.php" title="Listar Livros" >Listar Livros</a></li>
		<li><a href="inserirLivro.php" title="dfsds">Inserir Livro</a></li>
		<li><a href="listarCategorias.php" title="Listar Categorias">Listar Categorias</a></li>
		<li><a href="inserirCategoria.php" title="Inserir Categorias">Inserir Categorias</a></li>
		<li><a href="listarPedido.php" title="Listar Pedidos">Listar Pedidos</a></li>
	</ul>
	</dd>

	<dt><a href="/discuss/"> Usuarios </a></dt>
	
	<dd>	
	<ul>
		<li><a href="/discuss/"> Listar Usuarios </a></li>
		<li><a href="/tutoriais/"> Inserir Usuarios </a></li>
		<li><a href="/demos/">Demo</a></li>
	</ul>
	</dd>
	
	<dt><a href="/dev/">OTRO MENUZINHO</a></dt>
	
	<dd>
	<ul>
		<li><a href="/src/">Por ISBN</a></li>
		<li><a href="/dev/bugs/">Bug Tracking</a></li>
		<li><a href="/dev/recent/">Recent Changes</a></li>
	</ul>
	</dd>

 </dl>
 * 
 * 
 * 
 */


	


	static function gerarMenuAdmin()
	{
		$conteudo = '
	
					<div id="menucategorias">
						<dl>
							<dt> <a href="#livros"> Livros </a></dt>
							<dd>
								<ul>
								
									<li><a href="listarLivros.php" title="Listar Livros">Listar Livros</a></li>
									<li><a href="inserirLivro.php" title="Inserir Livros">Inserir Livro</a></li>
								</ul>
							</dd>	
							<dt> <a href="#categorias"> Categorias </a></dt>
							<dd>
								<ul>
									<li><a href="listarCategorias.php" title="Listar Categorias">Listar Categorias</a></li>
									<li><a href="inserirCategoria.php" title="Inserir Categorias">Inserir Categorias</a></li>
								</ul>						
							</dd>
							
							<dt> <a href="#pedidos"> Pedidos </a></dt>
							<dd>
								<ul>						
									<li><a href="listarPedido.php" title="Listar Pedidos">Listar Pedidos</a></li>
								</ul>						
							</dd>
						
					
					';
		
		/*
		 * 
		 * GAMBIARRRAAAA PARA VER O MENU ADMINIOSTRATIVO
		 * RETIRAR A NEGACAO "!" QDO TERMINAR
		 */
		
		if(!Seguranca::temPerfil('admin'))
		{
			$conteudo .= '	
							<dt> <a href="#sistema"> Sistema </a></dt>
							<dd>
								<ul>
									<li><a href="listarUsuario.php">Listar Usuarios</a></li>
									<li><a href="inserirUsuario.php">Inserir Usuario</a></li>
								</ul>
							</dd>		
							';
		}
		
				$conteudo .= '</dl></div>';
				return $conteudo;
		
	}
	
	static function gerarListaCategorias()
	{
		$tabCategoria = new Categoria();
		$categorias = $tabCategoria->listarAlfabetico();
		
		$conteudo = '
					<div id="menucategorias">
					<h1>Categorias</h1>
					<ul>'."\n";

		while($cat = $categorias->fetchObject())
		{
			$conteudo .= '
					<li>
						<a href="livrosCategorias.php?catid=' . $cat->id . '">'. $cat->descricao . '</a>
					</li>' . "\n";
		}						
									
		$conteudo .= '</ul></div>';	
		return $conteudo;
	 }
	 
	 static public function gerarAdmin($conteudo='')
	 {
	 	self::gerarCabecalhoSite();
	 	echo self::gerarMenuAdmin();
	 	echo $conteudo;
	 	self::gerarRodape();
	 }

	 static public function gerarSite($conteudo = '')
	 {
	 	self::gerarCabecalhoSite();
	 	echo self::gerarListaCategorias();
	 	echo $conteudo;
	 	self::gerarRodape();
	 }
	 
	 static function gerarLivroResumo($objLivro)
	 {
	 	//globc
	 	
	 	$arquivo = 'livroResumo.html';
	 	$parametros = array(
	 	
	 						'%IMAGEM%'   => IMAGES_DIR . $objLivro->isbn . '.jpeg',
	 						'%LIVROID%'  => $objLivro->id,
	 						'%TITULO%'   => $objLivro->titulo,
	 						'%AUTOR%'    => $objLivro->autor,
	 						'%PRECO%'	 => number_format($objLivro->preco, 2, ',' , '.'),
	 						'%SUMARIO%'  => nl2br($objLivro->sumario),	
	 						
	 						);
		
	 			return self::pegarArquivo($arquivo, $parametros);
	 }
	 
	 
	static public function gerarLogin($parametros)
	{
		$arquivo = 'login.html';
		return self::pegarArquivo($arquivo, $parametros);
	}
	 
	
	private static function debug()
	{
		global $debug, $DEBUG;
		
		if($debug)
		{
			$conteudo = '<div id="debug">';
			
			foreach($DEBUG as $chave=>$valor)
			{
				$conteudo .= "<h1>$chave</h1>\n<pre>$valor</pre>";
				
			}
		
		$conteudo .= "<h1>SESSÃO</h1> \n<pre>" . print_r($_SESSION,true) . "</pre>";
		
		$conteudo .= "<h1>COOKIE</h1> \n <pre>". print_r($_COOKIE,true) . "</pre>";
		
		$conteudo .= "<h1>POST</h1> \n <pre>". print_r($_POST,true) . "</pre>";
		
		$conteudo .= "<h1>FILES</h1> \n <pre>". print_r($_FILES,true) . "</pre>";
		
		$conteudo .= '</div>';
			
		}
		
		return $conteudo;
		
	}
	

	static private function pegarArquivo($arquivo, $parametros=array())
	{
		try
		{
			$dir = SITE_PATH . TEMPLATES_DIR;  
			
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
	
					throw new Exception("Template $dir$arquivo não existe");
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

			error_log(date('d-m-Y H:i:s') . " - " . $erro, 3, LOG_FILE);
			
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
		$arquivo = 'cabecalhoSite.html';
					$parametros = array('%CARRINHO_TOTAL_ITENS%'=>$_SESSION['produtos'],
							'%CARRINHO_VALOR_TOTAL%'=>$_SESSION['total']);
	
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
	
	static public function randClassTable()
	{
		$arr = array("A", "C" , "X", "U");
		
		return $arr[rand(0,3)];
		
		
	}
	
	static public function inserirLivro($tabLivro,$_POST)
	{
		
		 if($_SERVER['REQUEST_METHOD'] == 'POST' AND isset($_POST['isbn']))
		 {
				    //print_r($tabLivro->inserir($_POST));
					//$descFilter = filter_input(INPUT_POST, $_POST['descricao'], FILTER_SANITIZE_SPECIAL_CHARS);
										
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
													
							if($tabLivro->inserir($dados))
							{ 
								$conteudo .= '<div id="mensagem" class="success">Registro Salvo</div>';
							}
							else
							{		
								$conteudo .= '<div id="mensagem" class="error">Erro ao Salvar Registro!</div>';
								unset($_POST['isbn']);
							}

							echo $conteudo;
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
						$campos = array('isbn','autor', 'titulo', 'cat_id','preco', 'sumario');
						echo Template::gerarFormPOST($tabLivro, 'inserirLivro.php' , $campos, 'Inserir Livros');
						//print_r($tabLivro->legendas['preco']);
						//echo $tabLivro->listar();
						
	   		}
	
	}
	
	
	
	static public function inserirUsuario($tabUsuario,$_POST)
	{		//print_r($_POST);
		
		 if($_SERVER['REQUEST_METHOD'] == 'POST' AND isset($_POST['username']))
		 {
				    //print_r($tabLivro->inserir($_POST));
					//$descFilter = filter_input(INPUT_POST, $_POST['descricao'], FILTER_SANITIZE_SPECIAL_CHARS);
										
					$filtro = array(
									'id'   	=> array('filter' => FILTER_SANITIZE_NUMBER_INT, FILTER_NULL_ON_FAILURE),
									'username'  	=> array('filter' => FILTER_SANITIZE_STRING,
												     'flags'   => FILTER_FLAG_STRIP_LOW),
									'password'    => array('filter' => FILTER_SANITIZE_STRING | FILTER_SANITIZE_NUMBER_INT,
													 'flags'   => FILTER_FLAG_STRIP_LOW),
									'created_at' => array('filter' => FILTER_VALIDATE_REGEXP,
														  				array("options"=>array("regexp"=>"/^[0-9]{4}[-/][0-9]{1,2}[-/][0-9]{1,2}\$/")),
													 	  'flags'   => FILTER_FLAG_STRIP_LOW),	
									'last_login' => array('filter' => FILTER_VALIDATE_REGEXP,
														  				array("options"=>array("regexp"=>"/^[0-9]{4}[-/][0-9]{1,2}[-/][0-9]{1,2}\$/")),
													 	  'flags'   => FILTER_FLAG_STRIP_LOW),
			
									'is_active'	=> array('filter' => FILTER_VALIDATE_BOOLEAN,
													 'flags'   => FILTER_FLAG_STRIP_LOW),								
									'is_super_admin'	=> array('filter' => FILTER_VALIDATE_BOOLEAN,
													 'flags'   => FILTER_FLAG_STRIP_LOW),					
									);
					try
					{				
							$dados = filter_input_array(INPUT_POST, $filtro); 
							/*
							 * Por enqto!
							 */
							$dados['is_active'] = '1';
							
							print_r($dados);				
							if($tabUsuario->inserir($dados))
							{ 
								$conteudo .= '<div id="mensagem" class="success">Registro Salvo</div>';
							}
							else
							{		
								$conteudo .= '<div id="mensagem" class="error">Erro ao Salvar Registro!</div>';
								unset($_POST['isbn']);
							}

							echo $conteudo;
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
						//$campos = array('id','username','password','created_at','last_login','is_active','is_super_admin');
						$campos = array('username','password','is_super_admin');
						echo Template::gerarFormPOST($tabUsuario, 'inserirUsuario.php' , $campos, 'Inserir Usuario');
						//print_r($tabLivro->legendas['preco']);
						//echo $tabLivro->listar();
						
	   		}
	
	}
	
	
	
	static public function inserirCategoria($tabCategoria,$_POST)
	{

		
		 if($_SERVER['REQUEST_METHOD'] == 'POST' AND isset($_POST['descricao']))
		 {
				    //print_r($tabLivro->inserir($_POST));
					//$descFilter = filter_input(INPUT_POST, $_POST['descricao'], FILTER_SANITIZE_SPECIAL_CHARS);
										
					$filtro = array(
									'descricao'	=> array('filter' => FILTER_SANITIZE_STRING,
														 'flags'   => FILTER_FLAG_STRIP_LOW),								
					
									);
					try
					{				
							$dados = filter_input_array(INPUT_POST, $filtro); 
													
							if($tabLivro->inserir($dados))
							{ 
								$conteudo .= '<div id="mensagem" class="success">Registro Salvo</div>';
							}
							else
							{		
								$conteudo .= '<div id="mensagem" class="error">Erro ao Salvar Registro!</div>';
								unset($_POST['isbn']);
							}

							echo $conteudo;
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
						$campos = array('descricao');
						echo Template::gerarFormPOST($tabCategoria, 'inserirCategoria.php' , $campos, 'Inserir Categoria');
						//print_r($tabLivro->legendas['preco']);
						//echo $tabLivro->listar();
						
	   		}
	
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	static function gerarFormPOST($tabObj, $formact , $campos=false, $titulo=false)
	{
		
		//echo $tabLivro->legendas;	
		
		$conteudo = '<div id="ins' . $tabObj->tabela . '" >
					<div class="titulo" >
						' . $titulo . ' 
					 </div>
					 
					 
					
				
					<form action="'. $formact .'" method="post">
					';
		if($campos)
		{
			foreach ($campos as $campo)
			{
			
				$conteudo .= '<li class="lins' . $tabObj->tabela . '-elem">' . $tabObj->legendas[$campo] . '<input type="text" name="' . $campo . '" value=""/> <br/></li>';
			
			}
		}
		else
		{
			foreach($tabObj->legendas as $campo)
			{

					$conteudo .= '<li class="lins' . $tabObj->tabela . '-elem">' . $campo . '<input type="text" name="' . $campo . '" value=""/> <br/></li>';
						

			}
		}
	
		
	
			$conteudo .= '<br/>';
		    $conteudo .= '<br/><button type="submit">Salvar</button>';
		    $conteudo .= ' </form>';

			$conteudo .= '</div></div>';
			
			return $conteudo;
	
		
		
}
	
	
	
	
	
	
	
	
	
	
	
	
	static function gerarTabela($tabObj, $tabResult, $campos=false)
	{
		$conteudo .= '<div id="dts_example"> 
					<div id="container">
					<div id="demo">
					<table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
					<thead>
						<tr class="odd gradeB">
							<th>  Ações </th>
					';
		if($campos)
		{
			foreach ($campos as $campo)
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
		$conteudo .= '<br/></thead> <tbody>';
	
		while($tabLinha = $tabResult->fetch(PDO::FETCH_ASSOC))
		{
			$conteudo .= '
				<tr class="grade' . self::randClassTable() . '">
				<td>
				<a href="' . 'editar' . ucfirst($tabObj->tabela) . '.php?' . $tabObj->chavePrimaria . "=" . $tabLinha[$tabObj->chavePrimaria] . '">
				<img src= "../images/icons/edit_icon.png" alt="editar" title="Editar"></a>
				<a href="' . 'excluir' . ucfirst($tabObj->tabela) . '.php?' . $tabObj->chavePrimaria . "=" . $tabLinha[$tabObj->chavePrimaria] . '">	
				<img src="../images/icons/excluir_small.png" alt="excluir" title="E×cluir"></a>
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
					
							$conteudo .= '<td class="expandable">' . $valor . '</td>';
						
					
				}
			
			}
			
			// Finalizando Zinha
			$conteudo .= '</tr>';
			
			
			
		} // finaliza while
			$conteudo .= '</tbody>';
			$conteudo .= '<tfoot>';
			
			$conteudo .= '<tr>
							<th>Tux</th>
							<th>tfooter</th>
						  </tr>	
							';
			$conteudo .= '</tfoot>';
			
			// Finalizando tabela
			$conteudo .= '</table></div></div></div></div>';
			
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