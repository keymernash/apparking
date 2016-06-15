<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
include('conexion.php');
	$lat=strip_tags(mysqli_real_escape_string($con,$_POST['lat']));
	$lng=strip_tags(mysqli_real_escape_string($con,$_POST['lng']));
	$pos=$lat.",".$lng;
	$con->query("INSERT INTO reg (Lat,Lng,Pos) VALUES ('$lat','$lng','$pos')");
	echo "<b> Posición guardada: </b>".$lat.", ".$lng;
?>