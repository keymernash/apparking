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

	public function Agregar($nombre, $apellido, $telefono, $email, $direccion, $usuario , $clave, $tipoUser)
	{
		$sql = "INSERT INTO usuario (Id, Nombre, Apellido, Telefono, Email, Direccion, Usuario, Clave) VALUES ('', '$nombre', '$apellido', '$telefono', '$email', '$direccion', '$usuario' , '$clave')";
			$this->conn->query($sql);

		if ($tipoUser == "encargado") {
			
			$sql = "SELECT * FROM usuario WHERE Email =".$email;
			$result = $this->conn->query($sql);

			$a = array();
			if($result){
				while($registro = $result->fetch_assoc()){
				  $a[] = $registro;
				}
			}

			echo count($a);

			$sql2 = "INSERT INTO encargado (Usuario_Id) VALUES ('".$a['id']."')";
			$this->conn->query($sql2);

		} else {
			$sql = "SELECT * FROM usuario WHERE Usuario = ".$usuario;
			$sqlExe = $this->conn->query($sql);

			$registrado = $sqlExe->fetch_assoc();

			$sql2 = "INSERT INTO valetparker (Usuario_Id) VALUES ('".$registrado['id']."')";
			$this->conn->query($sql2);
		}	
		/*$sql = "INSERT INTO usuario (Id, Nombre, Apellido, Telefono, Email, Direccion, Usuario, Clave) VALUES ('', '".$nombre."','".$apellido."','".$telefono."','".$direccion."','".$email."','".$usuario."','".$clave."')";*/		
	}

	public function Buscar($id)
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