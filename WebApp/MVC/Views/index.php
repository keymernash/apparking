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
				<div class="row">
					<div class="col s12">
						<h5 class="center"><b>TOTAL PARQUEADEROS REGISTRADOS</b></h5>
						<p class="center cantidad"><b><?php echo $cantidadP ?></b></p>
					</div>
				</div>
			</div>
			<div class="card-action right-align">
				<a href="index.php?ctl=parqueadero" class="waves-effect waves-light btn grey darken-3">Administrar</a>
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
				<div class="row">
					<div class="col s12">
						<h5 class="center"><b>TOTAL USUARIOS REGISTRADOS</b></h5>
						<p class="center cantidad"><b><?php echo $cantidadU ?></b></p>
					</div>
				</div>
			</div>
			<div class="card-action right-align">
				<a href="index.php?ctl=usuario" class="waves-effect waves-light btn grey darken-3">Administrar</a>
			</div>
		</div>			
	</div>
</div>	
<?php $contenido = ob_get_clean() ?>

<?php include 'plantillaAdmin.php' ?>