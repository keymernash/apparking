<?php 
/**
* 
*/
class ParqueoController 
{
	
	function __construct()
	{
		$this->parqueo = new Parqueo();
	}

	public function Index()
	{	
		
	}

	public function Crear()
	{
		date_default_timezone_set('America/Bogota');
		
		$nit = $_POST['nit'];
        $cedula = $_POST['cedula'];
        $nombre = "";
        $celular = "";
        $placa = $_POST['placa'];
        $fechaIn = getdate()['year']."-".getdate()['mon']."-".getdate()['mday'];
        $horaIn = getdate()['hours'].":".getdate()['minutes'].":".getdate()['seconds'];
        $fechaOut = "";
        $horaOut = "";
        $estado = "parqueado";
        $valetParking = "no";

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {            
            
            $new = $this->parqueo->Agregar($nit, $cedula, $nombre, $celular, $placa, $fechaIn, $horaIn, $fechaOut, $horaOut , $estado, $valetParking);
            //$mensaje = "Se ha agregado el usuario <b>".$nombre."</b> correctamente."; 
         }
        echo $new;
	}

	public function CrearConValet()
	{
		date_default_timezone_set('America/Bogota');
		
		$nit = $_POST['nit'];
        $cedula = $_POST['cedula'];
        $nombre = $_POST['nombre'];
        $celular = $_POST['celular'];
        $placa = $_POST['placa'];
        $fechaIn = getdate()['year']."-".getdate()['mon']."-".getdate()['mday'];
        $horaIn = getdate()['hours'].":".getdate()['minutes'].":".getdate()['seconds'];
        $fechaOut = "";
        $horaOut = "";
        $estado = "pendiente";
        $valetParking = "si";

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {            
            
            $new = $this->parqueo->Agregar($nit, $cedula, $nombre, $celular, $placa, $fechaIn, $horaIn, $fechaOut, $horaOut , $estado, $valetParking);
            //$mensaje = "Se ha agregado el usuario <b>".$nombre."</b> correctamente."; 
         }
        echo $new;
	}

	public function DeAlta()
	{
		date_default_timezone_set('America/Bogota');

		$id = $_POST['id'];
		$nit = $_POST['nit'];
		$fechaOut = getdate()['year']."-".getdate()['mon']."-".getdate()['mday'];
        $horaOut = getdate()['hours'].":".getdate()['minutes'].":".getdate()['seconds'];

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {            
            
            $new = $this->parqueo->Salida($id, $nit, $fechaOut, $horaOut);
            //$mensaje = "Se ha agregado el usuario <b>".$nombre."</b> correctamente."; 
         }
        echo $new; 
	}
}


?>