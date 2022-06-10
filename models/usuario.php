<?php

class Usuario{
	private $id;
	private $nombre;
	private $correo;
	private $rfc;
    private $password;
    private $idUsuario;
	private $telefono;
	private $website;
	private $direccion;
	private $db;
	private $bandera;
	
	public function __construct() {
		$this->db = Database::connect();
	}
	
	function getId() {
		return $this->id;
	}

	function getNombre() {
		return $this->nombre;
	}

	function getRfc() {
		return $this->rfc;
	}

	function getEmail() {
		return $this->correo;
	}

	function getTelefono() {
		return $this->telefono;
	}

	function getWebsite() {
		return $this->website;
	}

	function getDireccion() {
		return $this->direccion;
	}

	function getBandera() {
		return $this->bandera;
	}

	function getPassword() {
		return password_hash($this->db->real_escape_string($this->password), PASSWORD_BCRYPT, ['cost' => 4]);
	}

	function setId($id) {
		$this->id = $id;
	}

	function setNombre($nombre) {
		$this->nombre = $this->db->real_escape_string($nombre);
	}

	function setCorreo($correo) {
		$this->correo = $this->db->real_escape_string($correo);
	}

	function setRfc($rfc) {
		$this->rfc = $this->db->real_escape_string($rfc);
	}

	function setTelefono($telefono) {
		$this->telefono = $this->db->real_escape_string($telefono);
	}


	function setWebsite($website) {
		$this->website = $this->db->real_escape_string($website);
	}

	
	function setDireccion($direccion) {
		$this->direccion = $this->db->real_escape_string($direccion);
	}

	function setBandera($bandera) {
		$this->bandera = $this->db->real_escape_string($bandera);
	}


	function setPassword($password) {
		$this->password = $password;
	}


	public function save(){
	
		if($this->getBandera() == 'true'){
			
		$sql = "INSERT INTO usuarios VALUES(NULL, '{$this->getNombre()}','{$this->getEmail()}', '{$this->getRfc()}', '{$this->getPassword()}', '{$this->getId()}','{$this->getTelefono()}','{$this->getWebsite()}','{$this->getDireccion()}');";
		}else{
			
		$sql = "INSERT INTO usuarios VALUES(NULL, '{$this->getNombre()}','{$this->getEmail()}', '{$this->getRfc()}', '{$this->getPassword()}', null,null,null,null);";
		}

		$save = $this->db->query($sql);

		$result = false;
		if($save){
			$result = true;
		}
		return $result;
	}
	public function updatePassword(){
		
		$sql ="UPDATE usuarios SET password='{$this->getPassword()}' WHERE id = '{$this->getId()}'";
		$update = $this->db->query($sql);
		
		return $update;
	}

	public function update(){
		
		if($this->getBandera() == 'true'){
			
			$sql ="UPDATE usuarios SET nombre = '{$this->getNombre()}', correo = '{$this->getEmail()}', rfc = '{$this->getRfc()}',telefono='{$this->getTelefono()}', website='{$this->getWebsite()}' , direccion='{$this->getDireccion()}' WHERE id = '{$this->getId()}'";

		}else{
			$sql ="UPDATE usuarios SET nombre = '{$this->getNombre()}', correo = '{$this->getEmail()}', rfc = '{$this->getRfc()}',telefono='{$this->getTelefono()}', website='{$this->getWebsite()}' WHERE id = '{$this->getId()}'";
		}

		$update = $this->db->query($sql);
		
		$result = false;
		
		if($update){
			$result = true;
		}
		return $result;
	}

	public function delete(){
		$sql = "DELETE FROM usuarios WHERE id='{$this->getId()}'";
		$delete = $this->db->query($sql);
		return $delete;

	}

	public function getUsuario(){
		$usuario = $this->db->query("SELECT * FROM usuarios Where id = '{$_SESSION['identity']->id}';");

		return $usuario->fetch_object();
	}

	public function getOne(){
		$usuario = $this->db->query("SELECT * FROM usuarios WHERE id = {$this->getId()}");
		return $usuario->fetch_object();
	}

	public function consulta(){
		$result = false;
		$email = $this->correo;
		$rfc = $this->rfc;
		
		// Comprobar si existe correo y rfc
		$sql = "SELECT * FROM usuarios WHERE correo = '$email' and rfc = '$rfc'";

		$consulta = $this->db->query($sql);
		
		$result = false;
		if($consulta->num_rows == 1){
			$result = $consulta->fetch_object();
		}
		return $result;
	}

	public function getAll(){
		$usuarios = $this->db->query("SELECT * FROM usuarios WHERE idUsuario='{$_SESSION['identity']->id}' ORDER BY id ASC;");
		return $usuarios;
	}
	
	public function login(){
		$result = false;
		$email = $this->correo;
		$password = $this->password;

		// Comprobar si existe el usuario
		$sql = "SELECT * FROM usuarios WHERE correo = '$email'";
		$login = $this->db->query($sql);
		
		
		if($login && $login->num_rows == 1){
			$usuario = $login->fetch_object();
			
			// Verificar la contraseña
			$verify = password_verify($password, $usuario->password);
			
			if($verify){
				$result = $usuario;
			}
		}
		return $result;
	}
	
	
	
}