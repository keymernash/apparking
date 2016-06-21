<?php 
/**
* 
*/
class Usuario 
{
	private $conn;
	function __construct()
	{
		$this->conn = Conexion::conectar();
	}

	public function Agregar($nombre, $apellido, $telefono, $email, $direccion, $usuario , $clave, $tipoUser, $park)
	{
		//validar si existe el usuario o el email		
		$sql = "SELECT * FROM usuario WHERE Usuario = '".$usuario."'";
		$result = $this->conn->query($sql);

		$sql2 = "SELECT * FROM usuario WHERE Email = '".$email."'";
		$result2 = $this->conn->query($sql2);

		if ($result->num_rows > 0) {
			return "El usuario ".$usuario." ya esta registrado.";
		}
		if ($result2->num_rows > 0) {
			return "El email ".$email." ya esta registrado.";
		}

		$sql = "INSERT INTO usuario (Id, Nombre, Apellido, Telefono, Email, Direccion, Usuario, Clave) VALUES ('', '".$nombre."','".$apellido."','".$telefono."','".$email."','".$direccion."','".$usuario."','".$clave."')";		
		$this->conn->query($sql);

		//id del usuario agredado	
		$sql = "SELECT MAX(Id) AS id FROM usuario";
		$result = $this->conn->query($sql);

		if ($result) {
			$lastUser = $result->fetch_assoc();

			if ($tipoUser == "encargado") {		
				//si el usuario es encargado
				$sql = "INSERT INTO encargado (Usuario_Id) VALUES ('".$lastUser['id']."')";
				$this->conn->query($sql);

			} else {			
				//si el usuario es valetparking
				$sql = "INSERT INTO valetparker (Usuario_Id, Parqueadero_NIT) VALUES ('".$lastUser['id']."','".$park."')";
				$this->conn->query($sql);
			}	

			return "Se ha agregado el usuario <b>".$usuario."</b> correctamente.";
		}else{
			return "ERROR";
		}

		
		/*$sql = "INSERT INTO usuario (Id, Nombre, Apellido, Telefono, Email, Direccion, Usuario, Clave) VALUES ('', '$nombre', '$apellido', '$telefono', '$email', '$direccion', '$usuario' , '$clave')";*/		
	}

	public function Buscar($id)
	{
		$sql = "SELECT * FROM usuario WHERE Id = ".$id;

		$data = $this->conn->query($sql);

		while ($row = $data->fetch_assoc()) {
			$this->resultado[] = $row;
		}

		return $resultado;
	}

	public function Editar($datos)
	{
		# code...
	}

	public function Eliminar($id)
	{
		# code...
	}

	public function Encargados()
	{
		$sql = "SELECT usuario.* FROM usuario,encargado WHERE usuario.Id = encargado.Usuario_Id";
		$result = $this->conn->query($sql);

		$encargados = array();
		while ($row = $result->fetch_assoc()) {
			$encargados[] = $row;
		}
		
		return $encargados;
	}
	
	public function ListarContar()
	{
		$sql = "SELECT * FROM usuario";
		$result = $this->conn->query($sql);

		$usuarios = array();
		while ($row = $result->fetch_assoc()) {
			$usuarios[] = $row;
		}

		$datos[0] = $usuarios;
		$datos[1] = $result->num_rows; 

		return $datos;
	}

	public function ListarPagina($inicio, $TAMANO_PAGINA)
	{
		$sql = "SELECT * FROM usuario ORDER BY Nombre  LIMIT ".$inicio."," . $TAMANO_PAGINA;
		$result = $this->conn->query($sql);

		$usuarios = array();
		while ($row = $result->fetch_assoc()) {
		   $usuarios[] = $row;
		}

		return $usuarios;
	}

	public function obtenerDatosSesion($usuario)
	{
		$sql = "SELECT Id FROM usuario WHERE Usuario = '$usuario'";
		$result = $this->conn->query($sql);

		$find = $result->fetch_assoc();

		$sql = "SELECT * FROM parqueadero WHERE Encargado_Usuario_Id =".$find['Id'];
		$result = $this->conn->query($sql);

		$datosP = $result->fetch_assoc();

		return $datosP;
	}

	public function ContarUsuarios()
		{
			$sql = "SELECT * FROM usuario";
			$result = $this->conn->query($sql);

			$users = array();
			$cantidad = 0;
			if ($result) {
				while ($users = $result->fetch_assoc()) {
					$users[] = count($users);
					$cantidad++;
				}

				return $cantidad;
			}

		}	

}

?>