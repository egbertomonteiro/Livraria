<?php

class Categoria extends Tabela
{
	protected $tabela = 'categoria';
	protected $chavePrimaria = 'id';
	protected $campos = array('id','descricao');
	protected $legendas = array(
									'id'=>'ID',
									'descricao'=>'Categoria'
								);
	
								
	function listarAlfabetico()
	{
		return $this->listar(null,'descricao');
	}
	
}


?>