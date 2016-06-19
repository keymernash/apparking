<?php 
/**
* 
*/
class Parqueo 
{	
	private $conn;
	function __construct()
	{
		$this->conn = Conexion::conectar();
	}

	public function Agregar($nit, $cedula, $placa, $fechaIn, $horaIn, $fechaOut, $horaOut , $estado, $valetParking)
	{
		$sql = "INSERT INTO parqueo (Id, Parqueadero_Nit, Cliente_Cedula, Placa, Fecha_entrada, Hora_entrada, Fecha_salida, Hora_salida, Estado, ValetParking) VALUES ('', '$nit', '$cedula', '$placa', '$fechaIn', '$horaIn', '$fechaOut', '$horaOut', '$estado', '$valetParking')";
		$result = $this->conn->query($sql);

		if ($result) 
		{
			$sql = "SELECT Disponibilidad FROM parqueadero WHERE NIT = ".$nit;
			$result = $this->conn->query($sql);

			$dis = $result->fetch_assoc();

			$disActual = $dis['Disponibilidad'] - 1;

			$sql = "UPDATE parqueadero SET Disponibilidad = '$disActual' WHERE NIT = ".$nit;
			$result = $this->conn->query($sql);

			return "Parqueo de vehiculo con Placa: <b>".$placa."</b> agregado correctamente. Disponibilidad: ".$disActual;
		} else {
			return "ERROR al registrar parqueo";
		}
			
	}

	public function Buscar($id)
	{
		# code...
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