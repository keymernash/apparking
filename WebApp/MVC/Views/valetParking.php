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
			
				<div class="col s12 m12 card left-align">						
					<div class="card-content">						
						<div class="card-tittle">
							<h4>Solicitar Valet Parking</h4>
						</div>
						<div class="row">
							<form class="col s12" action="index.php?ctl=newValet" method="POST">	
								<div class="row">
									<div class="input-field col s12 m12">								
										<select name="nit">
											<option value="null" disabled selected>Seleccione parqueadero</option>
											<?php foreach ($parqueaderos as $parqueadero): ?>
												<option value="<?php echo $parqueadero['NIT'] ?>"><?php echo $parqueadero['Nombre'] ?></option>
											<?php endforeach ?>
									    </select>
									</div>
									<div class="input-field col s12 m6">
									  <input name="cedula" type="text" class="validate" required>
									  <label for="cedula">Cédula</label>
									</div>
									<div class="input-field col s12 m6">
									  <input name="nombre" type="text" class="validate" required>
									  <label for="nombre">Nombre</label>
									</div>
									<div class="input-field col s12 m6">
									  <input name="celular" type="text" class="validate" required>
									  <label for="celular">Celular</label>
									</div>
									<div class="input-field col s12 m6">
									  <input name="placa" type="text" class="validate" required>
									  <label for="placa">Placa Vehiculo</label>
									</div>			  									
								</div>
								<input type="submit" name="entrar" value="SOLICITAR" class="waves-effect waves-light btn grey darken-3 col s12 m2 offset-m5"/>
							</form>
						</div>							
					</div>		  
				</div>
        
		</div>		
	</div>	
</div>
<script type="text/javascript" src="./Public/js/jquery.js"></script>
<script type="text/javascript" src="./Public/js/materialize.min.js"></script>
<script type="text/javascript" src="./Public/js/myjs.js"></script>

</body>
</html>