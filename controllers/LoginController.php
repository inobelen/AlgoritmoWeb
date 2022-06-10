<?php
require_once 'models/usuario.php';
class loginController{
	
	public function index(){
		require_once 'views/login/index.php';
	}


	public function login(){
		if(isset($_POST)){
			// Identificar al usuario
			// Consulta a la base de datos
			
			$usuario = new Usuario();
			$usuario->setCorreo($_POST['correo']);
			$usuario->setPassword($_POST['password']);
			
			$identity = $usuario->login();
			
			if($identity && is_object($identity)){
			
				$_SESSION['identity'] = $identity;
				header("Location:".base_url.'principal/index');
			}else{
				//$_SESSION['error_login'] = 'Identificación fallida !!';
				header("Location:".base_url);
			}
		
		}
		//header("Location:".base_url);
	}

	
}