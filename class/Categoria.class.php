<?php

class Categoria extends Tabela
{
	protected $tabela = 'categoria';
	protected $chavePrimaria = 'id';
	protected $campos = array('id','descricao', 'tipo');
	protected $legendas = array(
									'id'=>'ID',
									'descricao'=>'Descricao',
									'tipo' => 'Tipo'
								);
	
								
	function listarAlfabetico()
	{
		return $this->listar(null,'descricao');
	}
	
}


?>