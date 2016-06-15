<?php
	$con = new mysqli("localhost", "root", "", "google");
	if ($con->connect_errno) {
	    echo "Fallo al conectar a MySQL: (" . $con->connect_errno . ") " . $con->connect_error;
	}
?>