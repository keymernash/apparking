<?php 
/**
* 
*/
class ParqueaderoController 
{
	
	function __construct()
	{
		$this->parqueadero = new Parqueadero();
		$this->usuario = new Usuario();
	}

	public function Index()
	{	
		$encargados = $this->usuario->Encargados();

		require_once 'Views/parqueadero.php';
	}

	public function Crear()
	{
		$nit = $_POST['nit'];
        $nombre = $_POST['nombre'];
        $direccion = $_POST['direccion'];
        $telefono = $_POST['telefono'];
        $tarifa = $_POST['tarifa'];
        $capacidad = $_POST['capacidad'];
        $disponibilidad = $_POST['capacidad'];
        $latitud = $_POST['latitud'];
        $longitud = $_POST['longitud'];
        $valetParking = $_POST['valetParking'];
        $encargado = $_POST['encargado'];


        if ($_SERVER['REQUEST_METHOD'] == 'POST') {            
            
            $new = $this->parqueadero->Agregar($nit, $nombre, $direccion, $telefono, $tarifa, $capacidad, $disponibilidad, $latitud, $longitud, $valetParking, $encargado);
            //$mensaje = "Se ha agregado el usuario <b>".$nombre."</b> correctamente."; 
         }
        echo $new;
	}

	public function Buscar()
	{
		$nit = $_GET['nit'];

		$park = $this->parqueadero->Buscar($nit);
	}

	public function Listar()
	{
		//$usuarios = $this->usuario->Listar()[0];

        //Limito la busqueda
        $TAMANO_PAGINA = 5;

        //examino la página a mostrar y el inicio del registro a mostrar

        $pagina = $_GET["pagina"];

        if (!$pagina) {
           $inicio = 0;
           $pagina = 1;
        }
        else {
           $inicio = ($pagina - 1) * $TAMANO_PAGINA;
        }
        //calculo el total de páginas
        $num_total_registros = $this->parqueadero->ListarContar()[1];
        $total_paginas = ceil($num_total_registros / $TAMANO_PAGINA);

        $parqueaderos = $this->parqueadero->ListarPagina($inicio, $TAMANO_PAGINA);

		require_once 'Views/parqueaderoListar.php';
	}
}

?>