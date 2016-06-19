<?php

    $sesion = new Sesion();
    
    if( isset($_POST["iniciar"]) )
    {        
        $usuario = $_POST["usuario"];
        $clave = $_POST["clave"];
        
        if($sesion->validarUsuario($usuario,$clave) == true)
        {           
            $sesion->set("usuario",$usuario);            
            header("location: index.php?ctl=inicio2&usuario=".$usuario);
        }
        elseif ($sesion->validarAdmin($usuario,$clave) == true)
        {
        	$sesion->set("usuario",$usuario);            
            header("location: index.php?ctl=inicio");        	          
        }else{
        	$error = "Usuario o clave es incorrecta.";  
        }
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<title>MaterialDesign</title>
	<link rel="stylesheet" href="./Public/css/materialize.min.css">
	<link rel="stylesheet" type="text/css" href="./Public/css/mystyle.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<body class="black">
<header> 	
	<nav class="yellow accent-4">
		<div class="nav-wrapper container">
			<div class="row">
				<div class="col s12">
			  		<a href="#" class="brand-logo grey-text text-darken-4"><b>Apparking</b></a>			    	
			  	</div>
		  	</div>
		</div>
	</nav>
</header>
<div class="container">
	<div class="row">
		<div class="col s12 center-align">
			<h1 class="white-text"><b>Apparking</b></h1>
			<h5 class="white-text"><i>Donde parquear esta alcance de tu dedo</i></h5>
			
				<div class="col s12 m4 offset-m4 card left-align">						
					<div class="card-content">						
						<div class="card-tittle">
							<h4>Iniciar sesión</h4>
						</div>
						<div class="row">
							<form action="" method="POST" class="col s12">
								<div class="row">
									<div class="input-field col s12">
										<!--<i class="material-icons prefix">account_circle</i>-->
									  <input id="usuario" type="text" class="validate" name="usuario" required>
									  <label for="usuario">Usuario</label>
									</div>
									<div class="input-field col s12">
										<!--<i class="material-icons prefix">vpn_key</i>-->
									  <input id="clave" type="password" class="validate" name="clave" required>
									  <label for="clave">Clave</label>
									</div>								
								<?php if (isset($error)): ?>
									<div class="input-field col s12 red-text"><?php echo $error; ?></div>
								<?php endif ?>
								</div>								
								<input type="submit" name="iniciar" value="ENTRAR" class="waves-effect waves-light btn grey darken-3 col s12 m5 right "/>
							</form>
						</div>							
					</div>		  
				</div>
        
		</div>		
	</div>	
</div>
<script type="text/javascript" src="./Public/js/jquery.js"></script>
<script type="text/javascript" src="./Public/js/materialize.min.js"></script>

</body>
</html>