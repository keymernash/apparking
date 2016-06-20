<?php

class IndexController
{      
    public function __construct()
    {
      $this->usuario = new Usuario();
      $this->parqueadero = new Parqueadero();
    }

    public function Login()
    {
        require_once 'Views/login.php';
    }
    
    public function Inicio()
    {
        require_once 'Views/index.php';
    }

    public function Inicio2()
    {  
        if (isset($_GET['usuario'])) {
            $usuario = $_GET['usuario'];  
            $datosP = $this->usuario->obtenerDatosSesion($usuario);

            require_once 'Views/index2.php';
        } else {
            header('Location: index.php?ctl=login');
        }
        
    }

    public function Inicio3()
    {        
        require_once 'Views/index3.php';
    }

    public function Logout()
    {
        require_once 'Models/CerrarSesion.php';
    }
    
     public function ValetParking()
    {
        $parqueaderos = $this->parqueadero->ListarContar()[0];
        require_once 'Views/valetParking.php';
    }
    
}

?>