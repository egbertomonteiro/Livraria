<?php

require_once('../configs/configurations.inc.php');

$parametros = array('%ERRO%' => '', '%LOGIN%' => '');

if($_SERVER['REQUEST_METHOD'] == 'POST' AND isset($_POST['login']))
{
	if(Seguranca::autenticar($_POST['login'], $_POST['senha']))
	{
		header('Location:index.php');
	}
	
	else
	{
		$parametros = array(
							'%ERRO%'  => '<caption> Usuario ou senha não conferem</caption>',
							'%LOGIN%' => $_POST['login'],
		
							);	
	}
	
}

echo Template::gerarCabecalhoAdmin();
echo Template::gerarLogin($parametros);
echo Template::gerarRodape();

?>