<?php
require_once 'models/usuario.php';

class usuarioController{
	
	public function index(){
		echo "<h1>usuario controller</h1>";
	}

    public function registro(){
		require_once 'views/usuario/registro.php';
	}
	public function usuarios(){
		require_once 'views/usuario/usuarios.php';
	}

	public function newUsuario(){
		require_once 'views/usuario/newUsuario.php';
	}

	public function newPassword(){
		require_once 'views/usuario/newPassword.php';
	}
	

	public function save(){

		if(isset($_POST)){
			$id = isset($_POST['id']) ? $_POST['id'] : false;
			$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
			$rfc = isset($_POST['rfc']) ? $_POST['rfc'] : false;
			$email = isset($_POST['correo']) ? $_POST['correo'] : false;
			$password = isset($_POST['password']) ? $_POST['password'] : false;

			$telefono = isset($_POST['telefono']) ? $_POST['telefono'] : false;
			$website = isset($_POST['website']) ? $_POST['website'] : false;
			$direccion = isset($_POST['direccion']) ? $_POST['direccion'] : false;
			$bandera = isset($_POST['bandera']) ? $_POST['bandera'] : false;

			if($bandera== 'true'){

				if($nombre && $rfc && $email && $password && $telefono && $website && $direccion && $bandera){
					$usuario = new Usuario();
					$usuario->setId($id);
					$usuario->setNombre($nombre);
					$usuario->setRfc($rfc);
					$usuario->setCorreo($email);
					$usuario->setPassword($password);

					$usuario->setTelefono($telefono);
					$usuario->setWebsite($website);
					$usuario->setDireccion($direccion);
					$usuario->setBandera($bandera);
	
					$save = $usuario->save();
					
					if($save){
						$_SESSION['register'] = "complete";
						header("Location:".base_url.'Usuario/usuarios');
					}else{
						$_SESSION['register'] = "failed";
						header("Location:".base_url.'Usuario/registro');
					}
				}else{
					$_SESSION['register'] = "failed";
					header("Location:".base_url.'Usuario/registro');
				}

			}else{

			if($nombre && $rfc && $email && $password){
				$usuario = new Usuario();
				$usuario->setNombre($nombre);
				$usuario->setRfc($rfc);
				$usuario->setCorreo($email);
				$usuario->setPassword($password);

				$save = $usuario->save();
				
				if($save){
					$_SESSION['register'] = "complete";
					header("Location:".base_url);
				}else{
					$_SESSION['register'] = "failed";
					header("Location:".base_url.'Usuario/registro');
				}
			}else{
				$_SESSION['register'] = "failed";
				header("Location:".base_url.'Usuario/registro');
			}
		}
		}else{
			$_SESSION['register'] = "failed";
		}
		


	}

	public function update(){
		if(isset($_POST)){
			
			$id = isset($_POST['id']) ? $_POST['id'] : false;
			$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
			$rfc = isset($_POST['rfc']) ? $_POST['rfc'] : false;
			$email = isset($_POST['correo']) ? $_POST['correo'] : false;
			$password = isset($_POST['password']) ? $_POST['password'] : false;

			$telefono = isset($_POST['telefono']) ? $_POST['telefono'] : false;
			$website = isset($_POST['website']) ? $_POST['website'] : false;
			$direccion = isset($_POST['direccion']) ? $_POST['direccion'] : false;
			$bandera = isset($_POST['bandera']) ? $_POST['bandera'] : false;
			
			if($nombre && $rfc && $email && $telefono && $website){
				$usuario = new Usuario();
				$usuario->setId($id);
				$usuario->setNombre($nombre);
				$usuario->setRfc($rfc);
				$usuario->setCorreo($email);
				$usuario->setPassword($password);

				$usuario->setTelefono($telefono);
				$usuario->setWebsite($website);
				$usuario->setDireccion($direccion);
				$usuario->setBandera($bandera);
				

				$update = $usuario->update();
				
				if($update){
					$_SESSION['update'] = "complete";

					if($bandera=='true'){
						header("Location:".base_url.'usuario/usuarios');
					}else{
						header("Location:".base_url.'usuario/actualizarUsuario');
					}
					

				}else{
					$_SESSION['update'] = "failed";
				}
			}else{
				$_SESSION['update'] = "failed";
			}


		}else{
			$_SESSION['update'] = "failed";
		}
	}

	public function eliminar(){
		if(isset($_GET['id'])){
			$usuario = new Usuario();
			$usuario_id = $_GET['id'];
			$usuario->setId($usuario_id);
			$delete = $usuario->delete();
			header('Location:'.base_url.'usuario/usuarios');
		}else{
			header('Location:'.base_url.'usuario/usuarios');
		}
	}
	public function editarUsuario(){
		if(isset($_GET['id'])){
			$id = $_GET['id'];
			$edit = true;
			
			$usuario = new Usuario();
			$usuario->setId($id);
			
			$user = $usuario->getOne();
			
			require_once 'views/usuario/editarUsuario.php';
			
		}else{
			header('Location:'.base_url.'producto/gestion');
		}
	}

	public function restaurarPassword(){
		require_once 'views/usuario/passRecuperacion.php';
	}

	public function actualizarUsuario(){
		require_once 'views/usuario/update.php';
	}

	public function logout(){
		if(isset($_SESSION['identity'])){
			unset($_SESSION['identity']);
		}
		
		header("Location:".base_url);
	}



	public function recuperarPass(){
		if(isset($_POST)){
		
			$respuesta=[];

			$email = isset($_POST['correo']) ? $_POST['correo'] : false;
			$rfc = isset($_POST['rfc']) ? $_POST['rfc'] : false;
			
			if($rfc && $email){
			
				$usuario = new Usuario();
				$usuario->setRfc($rfc);
				$usuario->setCorreo($email);

				$consulta = $usuario->consulta();
				
			
				if($consulta != null){
					$_SESSION['recuperarPass'] = $consulta->id;
					$respuesta += ['recuperarPass'=>'Exitoso'];
					echo json_encode($respuesta);
					header("Location:".base_url.'Usuario/newPassword');

				}else{
					$_SESSION['recuperarPass'] = "Fallido";
					$respuesta += ['recuperarPass'=>'Fallido'];
					var_dump($respuesta);
					echo json_encode($respuesta);
					header("Location:".base_url.'Usuario/restaurarPassword');

				}
			}else{
				$_SESSION['register'] = "Fallido";
			}
		}else{
			$_SESSION['register'] = "Fallido";
		}
	}

	public function actualizarPassword(){
		if(isset($_POST)){
		
			$respuesta=[];

			$id = isset($_POST['id']) ? $_POST['id'] : false;
			$password = isset($_POST['password']) ? $_POST['password'] : false;
			
			if($id && $password){
			
				$usuario = new Usuario();
				$usuario->setId($id);
				$usuario->setPassword($password);

				$respuesta = $usuario->updatePassword();
				
				if($respuesta){
					header("Location:".base_url);
				}else{
					header("Location:".base_url.'Usuario/restaurarPassword');
				}

				
			}else{
				$_SESSION['actualizarPassword'] = "Fallido";
			}
		}else{
			$_SESSION['actualizarPassword'] = "Fallido";
		}
	}
	
}