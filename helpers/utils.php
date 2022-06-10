<?php

class Utils{
	
	public static function deleteSession($name){
		if(isset($_SESSION[$name])){
			$_SESSION[$name] = null;
			unset($_SESSION[$name]);
		}
		
		return $name;
	}
	
	
	public static function isIdentity(){
		if(!isset($_SESSION['identity'])){
			header("Location:".base_url);
		}else{
			return true;
		}
	}
	

	public static function showUsuarios(){
		require_once 'models/usuario.php';
		$usuario = new Usuario();
		$usuarios = $usuario->getAll();
		return $usuarios;
	}

	public static function showUsuario(){
		require_once 'models/usuario.php';
		$usuario = new Usuario();
		$usuario = $usuario->getUsuario();
		
		return $usuario;
	}

	
	
}
