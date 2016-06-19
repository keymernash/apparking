<?php 
	
$sesion = new Sesion();
$usuario = $sesion->get("usuario");	
if( $usuario == false )
{	
	header("Location: index.php?ctl=login");
}
else 
{
	$usuario = $sesion->get("usuario");	
	$sesion->termina_sesion();	
	header("location: index.php?ctl=login");
}

?>