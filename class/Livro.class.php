<?php

class Livro extends Tabela
{
	protected $tabela = 'livro';
	protected $chavePrimaria = 'id';
	protected $chaveEstrangeira = 'cat_id';
	protected $campos = array('id','isbn','autor','titulo','cat_id','preco','sumario');
	protected $legendas = array(
									'id'=>'ID',
								    'isbn'=>'ISBN',
									'autor'=>'Autor',
									'titulo'=>'Titulo',
									'cat_id'=>'CATID',
									'preco'=>'Preco',
									'sumario'=>'Sumario'
								);
	
								
	public function listarAlfabetico()
	{
		return $this->listar(null,'descricao');
	}
	
	public function listarPorCatID($chave)
	{	
		//static $resultado;
		
		$resultado = $this->listar($this->chaveEstrangeira . " = '$chave'");
		//var_dump($resultado);
		//return $resultado->fetchObject();
		return $resultado;
		
	}
	

	
}
?>