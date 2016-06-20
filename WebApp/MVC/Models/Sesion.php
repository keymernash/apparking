<?php

class Sesion {

  private $conex;

  function __construct() {
    $this->conex = Conexion::conectar();
     session_start ();
  }
  public function set($nombre, $valor) {
     $_SESSION [$nombre] = $valor;
  }
  public function get($nombre) {
     if (isset ( $_SESSION [$nombre] )) {
        return $_SESSION [$nombre];
     } else {
         return false;
     }
  }
  public function elimina_variable($nombre) {
      unset ( $_SESSION [$nombre] );
  }

  public function termina_sesion() {
      $_SESSION = array();
      session_destroy ();
  }

  public function validarAdmin($usuario, $clave)
  {     
      if( strcmp($usuario,"admin") == 0 && strcmp($clave,"@admin") == 0 ){
          return true;                        
      }else{                  
          return false;
      }
  }

  public function validarEncargado($usuario, $clave)
  {
      $idUser = "SELECT Id FROM usuario WHERE Usuario = '$usuario'";
      $result = $this->conex->query($idUser); 
      $fila = $result->fetch_assoc();     
      
      $encargado = "SELECT usuario.Clave FROM usuario,encargado WHERE usuario.Usuario = '".$usuario."' AND encargado.Usuario_Id = '".$fila['Id']."'";
      $result = $this->conex->query($encargado); 
      $fila = $result->fetch_assoc();     
      
      $result = $this->conex->query($encargado);
      
      if($result->num_rows > 0)
      {
          $fila = $result->fetch_assoc();
          if( strcmp($clave,$fila["Clave"]) == 0 )
              return true;                        
          else                    
              return false;
      }
      else
              return false;
  } 

  public function validarValetParking($usuario, $clave)
  {
      $idUser = "SELECT Id FROM usuario WHERE Usuario = '$usuario'";
      $result = $this->conex->query($idUser); 
      $fila = $result->fetch_assoc();     
      
      $encargado = "SELECT usuario.Clave FROM usuario,valetParker WHERE usuario.Usuario = '".$usuario."' AND valetParker.Usuario_Id = '".$fila['Id']."'";
      $result = $this->conex->query($encargado); 
      $fila = $result->fetch_assoc();     
      
      $result = $this->conex->query($encargado);
      
      if($result->num_rows > 0)
      {
          $fila = $result->fetch_assoc();
          if( strcmp($clave,$fila["Clave"]) == 0 )
              return true;                        
          else                    
              return false;
      }
      else
              return false;
  } 

}
?>