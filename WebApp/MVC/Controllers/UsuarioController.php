<?php 

class UsuarioController
{

    public function __construct()
    {
       $this->usuario = new Usuario();
       $this->parqueadero = new Parqueadero();
    }

    public function Index()
    {       
        $parqueaderos = $this->parqueadero->ListarParkValet();

        require_once 'Views/usuario.php';        
    }
    
    public function Crear()
    {
    	$nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $telefono = $_POST['telefono'];
        $email = $_POST['email'];
        $direccion = $_POST['direccion'];
        $usuario = $_POST['usuario'];
        $clave = $_POST['clave'];
        $tipoUser = $_POST['tipoUser'];

        


        if ($_SERVER['REQUEST_METHOD'] == 'POST') {    

            if (isset($_POST['park'])) {
                $park = $_POST['park'];
                $new = $this->usuario->Agregar($nombre,$apellido,$telefono,$email,$direccion,$usuario,$clave,$tipoUser,$park);
            }else{
                $new = $this->usuario->Agregar($nombre,$apellido,$telefono,$email,$direccion,$usuario,$clave,$tipoUser,"");
            }
            
            //$mensaje = "Se ha agregado el usuario <b>".$nombre."</b> correctamente."; 
         }
        echo $new;
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
        $num_total_registros = $this->usuario->ListarContar()[1];
        $total_paginas = ceil($num_total_registros / $TAMANO_PAGINA);

        $usuarios = $this->usuario->ListarPagina($inicio, $TAMANO_PAGINA);

        require_once 'Views/usuarioListar.php';
    }

    public function ListarEncargados()
    {
        $encargados = $this->usuario->Encargados();

        foreach ($encargados as $encargado) {
            echo $encargado['Id']." ---> ".$encargado['Nombre']."</br>";
        }
    }
    
}

?>