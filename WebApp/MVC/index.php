<?php 

// carga del modelo y los controladores
require_once 'Models/Conexion.php';
require_once 'Models/Sesion.php';
require_once 'Models/UsuarioModel.php';
require_once 'Models/ParqueaderoModel.php';
require_once 'Models/ParqueoModel.php';
require_once 'Controllers/UsuarioController.php';
require_once 'Controllers/ParqueaderoController.php';
require_once 'Controllers/ParqueoController.php';
require_once 'Controllers/IndexController.php';


// enrutamiento
$map = array(
    'valetParking' => array('controller' =>'IndexController', 'action' =>'ValetParking'),
    'login' => array('controller' =>'IndexController', 'action' =>'Login'),
    'logout' => array('controller' =>'IndexController', 'action' =>'Logout'),
    'inicio' => array('controller' =>'IndexController', 'action' =>'Inicio'),
    'inicio2' => array('controller' =>'IndexController', 'action' =>'Inicio2'),
    'inicio3' => array('controller' =>'IndexController', 'action' =>'Inicio3'),
    'usuario' => array('controller' =>'UsuarioController', 'action' => 'Index'),
    'newUser' => array('controller' =>'UsuarioController', 'action' =>'Crear'),
    'usuarioListar' => array('controller' =>'UsuarioController', 'action' => 'Listar'),
    'parqueadero' => array('controller' =>'ParqueaderoController', 'action' => 'Index'),
    'newParqueadero' => array('controller' =>'ParqueaderoController', 'action' => 'Crear'),
    'parkListar' => array('controller' =>'ParqueaderoController', 'action' => 'Listar'),
    'newParqueo' => array('controller' =>'ParqueoController', 'action' =>'Crear'),
    'newValet' => array('controller' =>'ParqueoController', 'action' =>'CrearConValet'),
    'deAlta' => array('controller' =>'ParqueoController', 'action' =>'DeAlta'),
    'buscarPark' => array('controller' =>'ParqueaderoController', 'action' => 'Buscar')
);

// Parseo de la ruta
if (isset($_GET['ctl'])) {
    if (isset($map[$_GET['ctl']])) {
     $ruta = $_GET['ctl'];
    } else {
     header('Status: 404 Not Found');
     echo '<html><body><h1>Error 404: No existe la ruta <i>' .
             $_GET['ctl'] .
             '</p></body></html>';
     exit;
    }
} else {
    $ruta = 'inicio';
}

$controlador = $map[$ruta];
// Ejecución del controlador asociado a la ruta

if (method_exists($controlador['controller'],$controlador['action'])) {
    call_user_func(array(new $controlador['controller'], $controlador['action']));
} else {

    header('Status: 404 Not Found');
    echo '<html><body><h1>Error 404: El controlador <i>' .
         $controlador['controller'] .
         '->' .
         $controlador['action'] .
         '</i> no existe</h1></body></html>';
}

?>