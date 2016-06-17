<?php ob_start() ?>
<div class="row">
	<div class="col s12 center-align white-text">
		<h1><b>Apparking</b></h1>
		<h5><i>Donde parquear esta alcance de tu dedo</i></h5>
	</div>		
</div>	
<div class="row">
	<div class="col s12 m6">
		<div class="card">
			<div class="card-image">
				<img class="responsive-img" src="./Public/image/parqueadero.jpg">
				<span class="card-title"><b>Parqueaderos</b></span>
			</div>
			<div class="card-content">				
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
				proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
			</div>
			<div class="card-action right-align">
				<a href="" class="waves-effect waves-light btn grey darken-3">Administrar</a>
			</div>
		</div>			
	</div>
	<div class="col s12 m6">
		<div class="card">
			<div class="card-image">
				<img class="responsive-img" src="./Public/image/usuarios.jpg">
				<span class="card-title"><b>Usuarios</b></span>
			</div>
			<div class="card-content">				
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
				proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
			</div>
			<div class="card-action right-align">
				<a href="" class="waves-effect waves-light btn grey darken-3">Administrar</a>
			</div>
		</div>			
	</div>
</div>	
<?php $contenido = ob_get_clean() ?>

<?php include 'plantillaAdmin.php' ?>