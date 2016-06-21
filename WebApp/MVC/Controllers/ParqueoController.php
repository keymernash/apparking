<?php 
/**
* 
*/
class ParqueoController 
{
	
	function __construct()
	{
        $this->usuario = new Usuario();
		$this->parqueo = new Parqueo();
	}

	public function servicioValet()
	{	
        if (isset($_GET['usuario']) || isset($_GET['nit']) ) {
            $usuario = $_GET['usuario']; 
            $nit =  $_GET['nit'];
            $datosP = $this->usuario->obtenerDatosSesion($usuario);
            $servicios = $this->parqueo->CargarServicios($nit);
            $valetParking = $this->parqueo->CargarUserValet($nit);

		  require_once 'Views/serviciosValet.php';
        } else {
            header('Location: index.php?ctl=login');
        }
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

    public function Aprobar()
    {
        $id = $_POST['id'];
        $valetParking = $_POST['valetParking'];
        if ($valetParking == "") {
            //redireccionar a la pagina anterior
            header('Location:' . getenv('HTTP_REFERER'));
        } else {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {            
                
                $new = $this->parqueo->AprobarServicio($id, $valetParking);
                //$mensaje = "Se ha agregado el usuario <b>".$nombre."</b> correctamente."; 
             }
            echo $new; 
        }       

    }

    public function AprobarBuscar()
    {
        $id = $_GET['id'];  
        $usuario = $_GET['usuario']; 
        $nit =  $_GET['nit'];
        $datosP = $this->usuario->obtenerDatosSesion($usuario);
        $valetParking = $this->parqueo->CargarUserValet($nit);         

        require_once 'Views/aprobarServicio.php';
        

    }
}


?>