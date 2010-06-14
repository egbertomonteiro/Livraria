<?php

class Seguranca
{
	static public function autenticar($usuario, $senha)
	{
			$tabUsuario = new Usuario;
			$filtro = "$login = '" . $_POST['login'] . "' AND senha = md5('" . $_POST['senha'] . "')";
			$usuario = $tabUsuario->listar($filtro); 
			
			if($usuario AND $usuario->rowCount())
			{
				session_start();
				
				$usuarioLogin = $usuario->fetchObject();
				
				$_SESSION['login'] = $_POST['login'];
				$_SESSION['horalogin'] = date('d/m/Y H:i');
				$_SESSION['nome'] = $usuarioLogin->nome;
				$_SESSION['perfil'] = $usuarioLogin->perfil;
				
				return true;
				
			}
			
			else
			{
				session_start();
				session_destroy();
				
				return false;
				
			}
									
	}

	static public function estaConectado()
	{
		session_start();
		
		if(!isset($_SESSION['login']))
		{
			session_destroy();
			header('Location:login.php');
		}
		
	}

	
	static public function temPerfil($perfil)
	{
		if(!is_array($perfil))
		{
			$perfil = array($perfil);
		}
		
		if(in_array($_SESSION['perfil'], $perfil))
		{
			return true;
		}
		
		else
		{
			return false;
		}
	}

	static public function checaAcesso()
	{
		if(!is_array($perfil))
		{
			$perfil = array($perfil);
		}
		
		if(!in_array($_SESSION['perfil'], $perfil))
		{
			header('Location:acessoNegado.php');
		}
		
	}
	
}
?>