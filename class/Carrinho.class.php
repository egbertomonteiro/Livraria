<?php

class Carrinho 
{
	
	private $sess;
	
	public  function __construct()
	{
		settype($_SESSION['produtos'], "array");
		$this->sess = $_SESSION['produtos'];
	}
	
	public function addTo($pid,$qtde)
	{
		if($pid!=''){
		$_SESSION['produtos'][$pid] = $qtde;
		$this->sess = $_SESSION['produtos'];}
		
	}
	
	public function delFrom($pid)
	{
		unset($_SESSION['produtos'][$pid]);
		$this->sess = $_SESSION['produtos'];		
		
	//	$this->sess = unset();
		
	}
	
	public function delCarr()
	{
		unset($_SESSION['produtos']);
		$this->sess = $_SESSION['produtos'];
	}
	
	public function getFrom()
	{
		return $this->sess;
	}
	

	
}


?>