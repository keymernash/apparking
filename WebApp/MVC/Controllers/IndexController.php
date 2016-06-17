<?php

class IndexController
{

    private $conexion;
    public function __construct()
    {
       
    }
    
    public function inicio()
    {
        require_once 'Views/index.php';
    }
    
}

?>