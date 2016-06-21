<?php
    
$sesion = new Sesion();
$usuario = $sesion->get("usuario");

if( $usuario == false || $usuario == "admin" )
{   
    header("Location: index.php?ctl=login");      
}
else
{
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<title>Apparking</title>
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
			  		<a href="#" class="brand-logo grey-text text-darken-4"><b><i class="material-icons left">room</i>Apparking</b></a>
			    	<a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons grey-text text-darken-4">menu</i></a>
			    	<ul class="right hide-on-med-and-down">
			    		<li><a href="index.php?ctl=inicio2&usuario=<?php echo $usuario;?>"><i class="material-icons left">view_quilt</i>Parqueos</a></li>	
			    		<li><a href="index.php?ctl=servicios&usuario=<?php echo $usuario;?>&nit=<?php echo $datosP['NIT']; ?>"><i class="material-icons left">import_export</i>Servicios Valet Parking</a></li>			    		
		    			<li><a class="dropdown-button" href="#!" data-activates="dropdownAdmin"><i class="material-icons left">perm_identity</i><?php echo $usuario;?><i class="material-icons right">arrow_drop_down</i></a></li>
				  	</ul>
				  	<!--Menu Mobile-->
				  	<ul id="slide-out" class="side-nav">
				  		<li><a href="index.php?ctl=inicio2&usuario=<?php echo $usuario;?>"><i class="material-icons left">view_quilt</i>Parqueos</a></li>	
			    		<li><a href="index.php?ctl=servicios&usuario=<?php echo $usuario;?>&nit=<?php echo $datosP['NIT']; ?>"><i class="material-icons left">import_export</i>Servicios</a></li>		
		    			<li><a href="index.php?ctl=logout"><i class="material-icons left">power_settings_new</i>Salir</a></li>
				  	</ul>
				  	<ul id="dropdownAdmin" class="dropdown-content">
						<li class="right-align"><a href="index.php?ctl=logout"><i class="material-icons left">power_settings_new</i>Salir</a></li>	
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

<?php } ?>