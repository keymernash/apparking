<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<title>Apparking-Admin</title>
	<link rel="stylesheet" href="./Public/css/materialize.min.css">
	<link rel="stylesheet" type="text/css" href="./Public/css/mystyle.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>
<body class="black">
<header> 	
	<nav class="yellow accent-4">
		<div class="nav-wrapper container">
			<div class="row">
				<div class="col s12">
			  		<a href="#" class="brand-logo grey-text text-darken-4"><b>Apparking</b></a>
			    	<a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons grey-text text-darken-4">menu</i></a>
			    	<ul class="right hide-on-med-and-down">
			    		<li><a href="parqueadero.html"><i class="material-icons left">view_quilt</i>Parqueaderos</a></li>
		    			<li><a href="index.php?ctl=usuario"><i class="material-icons left">supervisor_account</i>Usuarios</a></li>
				    	<li><a class="dropdown-button" href="#!" data-activates="dropdownAdmin"><i class="material-icons left">perm_identity</i>Administrador<i class="material-icons right">arrow_drop_down</i></a></li>
				  	</ul>
				  	<ul id="slide-out" class="side-nav">
				    	<li><a href="parqueadero.html"><i class="material-icons left">view_quilt</i>Parqueaderos</a></li>
		    			<li><a href="index.php?ctl=usuario"><i class="material-icons left">supervisor_account</i>Usuarios</a></li>
				    	<li><a href="#"><i class="material-icons left">power_settings_new</i>Salir</a></li>
				  	</ul>					  	
				  	<ul id="dropdownAdmin" class="dropdown-content">
						<li class="right-align"><a href=""><i class="material-icons left">power_settings_new</i>Salir</a></li>	
					</ul>
			  	</div>
		  	</div>
		</div>
	</nav>
</header>
<div class="container">
	<?php echo $contenido ?>
</div>
<script type="text/javascript" src="./Public/js/jquery.js"></script>
<script type="text/javascript" src="./Public/js/materialize.min.js"></script>
<script type="text/javascript" src="./Public/js/myjs.js"></script>

</body>
</html>