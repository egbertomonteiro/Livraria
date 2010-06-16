<?php

class Usuario extends Tabela
{
	protected $tabela = 'sf_guard_user';
	protected $chavePrimaria = 'id';
	//protected $chaveEstrangeira = 'cat_id';
	protected $campos = array('id','username','password','created_at','last_login','is_active','is_super_admin');
	
	
	
}
?>