<?php

class Conexion
{
	private $conex;

	public static function conectar(){
		$conex = new mysqli("localhost","root","","apparkingDB");
		$conex->query("SET NAMES 'utf8'");

		if ($conex->connect_errno) {
		    echo "Fallo al conectar a MySQL: (" . $conex->connect_errno . ") " . $conex->connect_error;
		}else{
			return $conex;			
		}
	}
}

?>