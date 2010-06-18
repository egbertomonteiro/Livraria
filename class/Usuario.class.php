<?php

class Usuario extends Tabela
{
	protected $tabela = 'sf_guard_user';
	protected $chavePrimaria = 'id';
	//protected $chaveEstrangeira = 'cat_id';
	protected $campos = array('id','username', 'algorithm', 'salt' ,'password','created_at','last_login','is_active','is_super_admin');
	protected $legendas = array(
									'id'=>'ID',
								    'username'=>'Username',
									'algorithm'=>'Algoritmo',
									'salt' => 'Salt',
									'password'=>'Password',
									'created_at'=>'Criado Em',
									'last_login'=>'Ultimo Login',
									'is_active'=>'Esta Ativo',
									'is_super_admin'=>'Usuario Admin'
								);

	
	
}
?>