<?php

class IndexController
{      
    public function __construct()
    {
      $this->usuario = new Usuario();
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
        $usuario = $_GET['usuario'];  
        $datosP = $this->usuario->obtenerDatosSesion($usuario);

        require_once 'Views/index2.php';
    }

    public function Logout()
    {
        require_once 'Models/CerrarSesion.php';
    }
    
}

?>