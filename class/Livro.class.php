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
	

	

	
}
?>