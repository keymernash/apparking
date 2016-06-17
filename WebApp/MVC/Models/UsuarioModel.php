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
		$resultado = array();
	}

	public function Agregar($nombre, $apellido, $telefono, $email, $direccion, $usuario , $clave)
	{
		$sql = "INSERT INTO usuario (Id, Nombre, Apellido, Telefono, Email, Direccion, Usuario, Clave) VALUES ('', '$nombre', '$apellido', '$telefono', '$direccion', '$email', '$usuario' , '$clave')";

		/*$sql = "INSERT INTO usuario (Id, Nombre, Apellido, Telefono, Email, Direccion, Usuario, Clave) VALUES ('', '".$nombre."','".$apellido."','".$telefono."','".$direccion."','".$email."','".$usuario."','".$clave."')";*/

		$this->conn->query($sql);
	}

	public function CargarEditar($id)
	{
		$sql = "SELECT * FROM usuario WHERE Id = ".$id;

		$data = $this->conn->query($sql);
		$this->resultado =  null;

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

	public function Listar()
	{
		# code...
	}
}

?>