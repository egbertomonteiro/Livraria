<?php

abstract class Tabela
{
	private static $conexao;
	
	protected $tabela;
	
	protected $chavePrimaria;
	
	protected $campos = array();
	
	protected $legendas = array();
	
	
	public function __construct()
	{
		global $dbconfig;
		
		if(!isset(self::$conexao))
		{
			$dsn = "{$dbconfig['driver']}:host={$dbconfig['server']};dbname={$dbconfig['database']}";
		}
		
		try
		{
				self::$conexao = new PDO($dsn,	
											 $dbconfig['user'],
											 $dbconfig['password'], 
											 $dbconfig['options']);
		}
		
		catch (PDOException $e)
		{
				$erro = 'Erro: ' . $e->getMessage() ."\n" . $e->getTraceAsString() . "\n";
				error_log(date('d-m-Y H:i:s') . '-' . $erro, 3, LOG_FILE);
				die($erro);
			
		}
			
	
	}
	
	public function __get($var)
	{
		return $this->$var;	
	}
	
	public function query($sql)
	{
		global $databaseDebug;

		if($databaseDebug){
			$GLOBALS['databaseDebug'] .= "$sql";
		}
		
		try
		{
			$type = strtoupper(substr($sql,0,6));
			if($type == 'SELECT')
			{	
				$resultado = self::$conexao->query($sql);
			}
			else
			{
				$resultado = self::$conexao->exec($sql);				
			}
			
		}
		
		catch (PDOException $e)
		{
				$erro = 'Erro: ' . $e->getMessage() ."\n" . $e->getTraceAsString() . "\n";
				error_log(date('d-m-Y H:i:s') . '-' . $erro, 3, LOG_FILE);
				die($erro);
			
		}
		
		
	}
	
	
	function listar ($filtro = null, $ordem = null, $limite = null)
	{
		$sql = "SELECT * FROM" . $this->tabela;
		
		if(!is_null($filtro))
		{
			$sql .= "WHERE $filtro";
		}
		
		if(!is_null($ordem))
		{
			$sql .= "ORDER BY $ordem";
		}
		
		if(!is_null($limite))
		{
			$sql .= "LIMIT $limite";
		}

		return $this->query($sql);
		
	}
	
	function listartPorChave($chave)
	{
		$resultado = $this->listar($this->chavePrimaria . " = '$chave'");
		return $resultado->fetchObject();
	}
	
	
	function excluir($chave)
	{
		$sql = "DELETE FROM" . $this->tabela . "WHERE" . $this->chavePrimaria . "= '$chave'";
		return $this->query($sql);	
	}
	
	function inserir($dados)
	{
		try 
		{
			if(!is_array($dados))
			{
				throw new Exception('Esperado um Array para Inserir Registro!');	
			}
			
		}	
		
		catch (Exception $e)
		{
				$erro = 'Erro: ' . $e->getMessage() ."\n" . $e->getTraceAsString() . "\n";
				error_log(date('d-m-Y H:i:s') . '-' . $erro, 3, LOG_FILE);
				die($erro);
			
		}
		
		$sql = "INSERT INTO" . $this->tabela . "(";

		foreach ($dados as $campo => $valor)
		{
			$campos .= "$campo,";
			$valores .= "$valor,";
		}
		
		$sql .= substr($campos, 0, -1) . ") VALUES (";
		$sql .= substr($valores, 0, -1) . ")";
		
		return $this->query($sql);
		
	}
	
	
	function atualizar($chave, $dados)
	{
		try 
		{
			if(!is_array($dados))
			{
				throw new Exception('Esperado um Array para Inserir Registro!');	
			}
			
		}	
		
		catch (Exception $e)
		{
				$erro = 'Erro: ' . $e->getMessage() ."\n" . $e->getTraceAsString() . "\n";
				error_log(date('d-m-Y H:i:s') . '-' . $erro, 3, LOG_FILE);
				die($erro);
			
		}
		
		$sql = "UPDATE" . $this->tabela . "SET";
		
		foreach ($dados as $campo => $valor)
		{
			 	$sql .= "$campo = '$valor',";
		}

		$sql = substr($sql,0,-1);
		
		$sql .= "WHERE" . $this->chavePrimaria . "= '$chave'";
		
		return $this->query($sql);
	}
	
	
	
	
	
	
	
	
	
	
	
	
}

?>