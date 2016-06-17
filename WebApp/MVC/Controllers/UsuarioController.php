<?php 

class UsuarioController
{

    public function __construct()
    {
       $this->usuario = new Usuario();
    }

    public function Index()
    {
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
            
            $this->usuario->Agregar($nombre,$apellido,$telefono,$email,$direccion,$usuario,$clave,$tipoUser);
            $mensaje = "Se ha agregado el usuario <b>".$nombre."</b> correctamente."; 
         }
        echo $mensaje;
    }
    
}

?>