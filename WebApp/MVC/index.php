<?php 

// carga del modelo y los controladores
require_once 'Models/UsuarioModel.php';
require_once 'Models/ParqueaderoModel.php';
require_once 'Models/ParqueoModel.php';
require_once 'Controllers/UsuarioController.php';
require_once 'Controllers/ParqueaderoController.php';
require_once 'Controllers/ParqueoController.php';
require_once 'Controllers/IndexController.php';


// enrutamiento
$map = array(
 'inicio' => array('controller' =>'IndexController', 'action' =>'inicio'),
 'usuario' => array('controller' =>'UsuarioController', 'action' => 'index'),
 'newUser' => array('controller' =>'UsuarioController', 'action' =>'Crear'),
 'usuarioListar' => array('controller' =>'UsuarioController', 'action' => 'Listar')
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