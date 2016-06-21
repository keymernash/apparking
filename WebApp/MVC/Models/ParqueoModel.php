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

	public function Agregar($nit, $cedula, $nombre, $celular, $placa, $fechaIn, $horaIn, $fechaOut, $horaOut , $estado, $valetParking)
	{
		$disponibilidad = $this->VerficarDisponibilidad($nit);
		$parqueo = $this->BuscarPlacaParqueo($placa);
		
		if ($disponibilidad == "ok") 
		{
			if (count($parqueo) == 0){				
				if (!is_null($cedula) && !is_null($nombre) && !is_null($celular) && $valetParking == "si" && $estado == "pendiente") 
				{	
					$cliente = $this->BuscarCliente($cedula);
					if (count($cliente) == 0) {
						$this->AgregarCliente($cedula, $nombre, $celular);
					}
					
				}
				$sql = "INSERT INTO parqueo (Id, Parqueadero_NIT, Cliente_Cedula, Placa, Fecha_entrada, Hora_entrada, Fecha_salida, Hora_salida, Estado, ValetParking) VALUES ('', '$nit', '$cedula', '$placa', '$fechaIn', '$horaIn', '$fechaOut', '$horaOut', '$estado', '$valetParking')";
				$result = $this->conn->query($sql);


				if ($result) 
				{	
					return $this->ModificarDisponibilidad("entra", $nit, $placa);				
					
				} else {
					echo "ERROR al registrar parqueo.";
				}
			}else{				
				return "ALERTA: El vehiculo con Placa: <b>".$placa."</b> aún esta parqueado o tiene un servio de Valet Parking pendiente.";
			}
		}else{
			return $disponibilidad;
		}
	}

	public function BuscarParqueadero($nit)
	{
		$sql = "SELECT * FROM parqueadero WHERE NIT = ".$nit;
		$result = $this->conn->query($sql);

		$parqueadero = $result->fetch_assoc();

		return $parqueadero;
	}

	public function BuscarParqueo($id, $nit)
	{
		$sql = "SELECT * FROM parqueo WHERE Id = '$id' AND Parqueadero_NIT = '$nit'";
		$result = $this->conn->query($sql);

		if ($result) {
			$parqueo = $result->fetch_assoc();
			return $parqueo;			
		}
	}

	public function BuscarPlacaParqueo($placa)
	{
		$sql = "SELECT * FROM parqueo WHERE Placa = '$placa' AND Estado = 'parqueado' OR Placa = '$placa' AND Estado = 'pendiente'";
		$result = $this->conn->query($sql);

		if ($result) {
			$parqueo = $result->fetch_assoc();
			return $parqueo;			
		}
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

	public function Salida($id, $nit, $fechaOut, $horaOut)
	{		
		$parqueoFind = $this->BuscarParqueo($id, $nit);

		if (count($parqueoFind) == 0) {
			return "ERROR: No existe un parqueo registrado con el Id: <b>".$id."</b>.";
		} elseif ($parqueoFind['Estado'] == "salido") 
		{	
			return "El parqueo ya esta dado de alta.";
		}else{

			$salido = $this->ModificarDisponibilidad("salir", $parqueoFind['Parqueadero_NIT'], $parqueoFind['Placa']);

			$this->ModificarEstado($id, "salido");
			$this->ModificarFechaHora($id, $fechaOut, $horaOut);

			return $salido;
		}		
	}

	public function ModificarDisponibilidad($opcion, $nit, $placa)
	{
		$parqueadero = $this->BuscarParqueadero($nit);		

		if ($opcion == "entra") {
			
			$disActual = $parqueadero['Disponibilidad'] - 1;

			$sql = "UPDATE parqueadero SET Disponibilidad = '$disActual' WHERE NIT = ".$nit;
			$result = $this->conn->query($sql);

			return "Parqueo de vehiculo con Placa: <b>".$placa."</b> agregado correctamente. Disponibilidad: ".$disActual;
		
		} else {
			$disActual = $parqueadero['Disponibilidad'] + 1;

			date_default_timezone_set('America/Bogota');

			$fechaOut = getdate()['year']."-".getdate()['mon']."-".getdate()['mday'];
       		$horaOut = getdate()['hours'].":".getdate()['minutes'].":".getdate()['seconds'];

			$sql = "UPDATE parqueadero SET Disponibilidad = '$disActual' WHERE NIT = ".$nit;
			$result = $this->conn->query($sql);
			if ($result) {
				return "Parqueo con vehiculo de Placa: <b>".$placa."</b> se ha dado de alta correctamente. Disponibilidad: ".$disActual;
			} else {
				return "ERROR al modifcar disponibilidad.";
			}			
		}		
	}

	public function VerficarDisponibilidad($nit)
	{
		$parqueadero = $this->BuscarParqueadero($nit);

		if ($parqueadero['Disponibilidad'] == 0) 
		{
			return "ERROR al registrar parqueo, no hay cupos disponibles.";
		} else {
			$msj = "ok";
			return $msj;
		}
	}

	public function ModificarEstado($id, $estado)
	{
		$sql = "UPDATE parqueo SET Estado = '$estado' WHERE Id = ".$id;
		$this->conn->query($sql);
	}

	public function ModificarFechaHora($id, $fechaOut, $horaOut)
	{
		$sql = "UPDATE parqueo SET Fecha_salida = '$fechaOut', Hora_salida = '$horaOut' WHERE Id = ".$id;
		$this->conn->query($sql);
	}

	public function AgregarCliente($cedula, $nombre, $celular)
	{
		$sql = "INSERT INTO cliente (Cedula, Nombre, Celular) VALUES ('$cedula', '$nombre', '$celular')";
		$result = $this->conn->query($sql);
	}

	public function BuscarCliente($cedula)
	{
		$sql = "SELECT * FROM cliente WHERE Cedula = '".$cedula."'";
		$result = $this->conn->query($sql);

		return $result->fetch_assoc();
	}

	public function CargarServicios($nit)
	{
		$sql = "SELECT * FROM parqueo WHERE Parqueadero_NIT = '$nit' AND Estado = 'pendiente'";
		$result = $this->conn->query($sql);

		$servicios = array();
		if ($result) {
			while ($row = $result->fetch_assoc()) {
				$servicios[] = $row; 
			}
		}	

		return $servicios;
	}

	public function CargarUserValet($nit)
	{
		$sql = "SELECT Id, Nombre FROM usuario WHERE Id IN (SELECT Usuario_Id FROM valetparker WHERE Parqueadero_NIT = '$nit')";
		$result = $this->conn->query($sql);

		$valetParking = array();
		if ($result) {
			while ($row = $result->fetch_assoc()) {
				$valetParking[] = $row; 
			}
		}	

		return $valetParking;
	}

	public function AprobarServicio($id, $valetParking)
	{
		$sql = "UPDATE parqueo SET Estado = 'en camino', ValetParking = '$valetParking' WHERE Id = ".$id;
		$result = $this->conn->query($sql);

		if ($result) 
		{
			return "Servicio de Valet Parking con Id: <b>".$id."</b> aprobado correctamente.";
		}else
		{
			return "ERROR: No se pudo aprobar el parqueo.";
		}
	}

}

?>