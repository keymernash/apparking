<?php ob_start() ?>
	<div class="row">
		<div class="col s12">
		<h3 class="white-text"><b>Panel de administración</b></h3>			
			<div class="col s12 card-panel">	
				<div class="card-content">						
					<div class="card-tittle">
						<h4>Administrar Parqueaderos</h4>
					</div>		
					<div class="row">
					    <div class="col s12">
					      <ul class="tabs">
					        <li class="tab col s3"><a class="active" href="#crear">Crear</a></li>
					        <li class="tab col s3"><a href="#editar">Editar</a></li>
					        <li class="tab col s3"><a href="#eliminar">Eliminar</a></li>
					        <li class="tab col s3"><a href="#listar" onclick="location.href ='index.php?ctl=parkListar&pagina=1'">Listar</a></li>
					      </ul>
					    </div>
					    <br>
					    <br>
					    <br>
					    <div id="crear" class="col s12">
					    	<form class="col s12" action="index.php?ctl=newParqueadero" method="POST">	
								<div class="row">										
									<div class="input-field col s12 m6">
									  <input name="nit" type="text" class="validate" required>
									  <label for="nit">NIT</label>
									</div>
									<div class="input-field col s12 m6">
									  <input name="nombre" type="text" class="validate" required>
									  <label for="nombre">Nombre</label>
									</div>
									<div class="input-field col s12 m6">
									  <input name="telefono" type="text" class="validate" required>
									  <label for="telefono">Teléfono</label>
									</div>
									<div class="input-field col s12 m6">
									  <input name="direccion" type="text" class="validate required">
									  <label for="direccion">Dirección</label>
									</div>
									<div class="input-field col s12 m6">
									  <input name="tarifa" type="text" class="validate" required>
									  <label for="tarifa">Tarifa</label>
									</div>
									<div class="input-field col s12 m6">
									  <input name="capacidad" type="text" class="validate" required>
									  <label for="capacidad">Capacidad</label>
									</div>
									<div class="input-filed col s12 m12">
										<label>Ubicación</label>
							  		<div id='googleMap' class="z-depth-1"></div>
							  	</div>
									<div class="input-field col s12 m6">
									  <input id="latitud" name="latitud" type="text" class="validate" required>
									  <label for="latitud">Latitud</label>
									</div>
									<div class="input-field col s12 m6">
									  <input id="longitud" name="longitud" type="text" class="validate" required>
									  <label for="longitud">Logitud</label>
									</div>	
									<div class="input-field col s12 m6">
									    <select name="encargado">
									      <option value="" disabled selected>Encargado</option>
									      <?php foreach ($encargados as $encargado): ?>
									      	<option value="<?php echo $encargado['Id'] ?>"><?php echo $encargado['Nombre'] ?>p</option>
									      <?php endforeach ?>
									    </select>
								  	</div>	
								  	<div class="input-field col s12 m6">
									    <select name="valetParking">
									      <option value="" disabled selected>¿Valet Parking?</option>
									      <option value="si">Si</option>
									      <option value="no">No</option>
									    </select>
								  	</div>								
								</div>
								<input type="submit" name="entrar" value="CREAR" class="waves-effect waves-light btn grey darken-3 col s12 m2 offset-m5"/>
							</form>
					    </div>
					    <div id="editar" class="col s12">
						    <form class="col s12" action="" method="POST">	
									<div class="row">										  
						        <div class="input-field col s12 m6 offset-m3">
						          <input name="nit" type="text" class="validate" required>
										  <label for="nit">NIT</label>
						        </div>
									</div>
									<input type="submit" name="entrar" value="BUSCAR" class="waves-effect waves-light btn grey darken-3 col s12 m2 offset-m5"/>
								</form>
					    </div>
					    <div id="eliminar" class="col s12">
						    <form class="col s12" action="" method="POST">	
									<div class="row">										  
						        <div class="input-field col s12 m6 offset-m3">
						          <input name="nit" type="text" class="validate" required>
										  <label for="nit">NIT</label>
						        </div>
									</div>
									<input type="submit" name="entrar" value="ELIMINAR" class="waves-effect waves-light btn grey darken-3 col s12 m2 offset-m5"/>
								</form>
					    </div>					    
				  	</div>				
				</div>		  
			</div>	       
		</div>		
	</div>	
<?php $contenido = ob_get_clean() ?>

<?php include 'plantillaAdmin.php' ?>

