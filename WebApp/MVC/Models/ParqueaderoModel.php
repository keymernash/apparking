<?php 
/**
* 
*/
class Parqueadero 
{	
	private $conn;
	function __construct()
	{
		$this->conn = Conexion::conectar();
	}

	public function Agregar($nit, $nombre, $direccion, $telefono, $tarifa, $capacidad, $disponibilidad, $latitud, $longitud, $valetParking, $encargado)
	{
		$existe = $this->Buscar($nit);

		if (!is_null($existe)) {
			return "Ya esta registrado un parqueadero con el Nit: <b>".$nit."</b>.";
		} else {
			$sql = "INSERT INTO parqueadero (Nit, Encargado_Usuario_Id, Nombre, Direccion, Telefono, Tarifa, Capacidad, Disponibilidad, Latitud, Longitud, ValetParking) VALUES ('$nit', $encargado, '$nombre', '$direccion', '$telefono', '$tarifa', '$capacidad', '$disponibilidad', '$latitud', '$longitud', '$valetParking')";

			$this->conn->query($sql);

			return "Parqueadero <b>".$nombre."</b> agregado correctamente.";
		}	
		
	}

	public function Buscar($nit)
	{
		$sql = "SELECT * FROM parqueadero WHERE Nit = ".$nit;
		$result = $this->conn->query($sql);

		$parqueadero = $result->fetch_assoc();

		return $parqueadero;
	}

	public function Editar($datos)
	{
		# code...
	}

	public function Eliminar($id)
	{
		# code...
	}

	public function ListarContar()
	{
		$sql = "SELECT * FROM parqueadero";
		$result = $this->conn->query($sql);

		$parqueaderos = array();
		while ($row = $result->fetch_assoc()) {
			$parqueaderos[] = $row;
		}

		$datos[0] = $parqueaderos;
		$datos[1] = $result->num_rows; 

		return $datos;
	}

	public function ListarPagina($inicio, $TAMANO_PAGINA)
	{
		$sql = "SELECT * FROM parqueadero ORDER BY Nit  LIMIT ".$inicio."," . $TAMANO_PAGINA;
		$result = $this->conn->query($sql);

		$parqueaderos = array();
		while ($row = $result->fetch_assoc()) {
		   $parqueaderos[] = $row;
		}

		return $parqueaderos;
	}

	public function ListarParkValet()
	{
		$sql = "SELECT * FROM parqueadero WHERE ValetParking = 'si'";
		$result = $this->conn->query($sql);

		$parqueaderos = array();
		while ($row = $result->fetch_assoc()) {
			$parqueaderos[] = $row;
		}

		return $parqueaderos;
	}
	
}

?>