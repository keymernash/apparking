<?php ob_start() ?>
	<div class="row">
		<div class="col s12">
		<h3 class="white-text"><b><?php echo $datosP['Nombre']; ?></b></h3>			
			<div class="col s12 card-panel">	
				<div class="card-content">						
					<div class="card-tittle">
						<h4>Aprobar Servicio Valet Parking</h4>
					</div>		
					<div class="row">
					    <div class="col s12">
					      <ul class="tabs">
					        <li class="tab col s3"><a class="active" href="#crear">Aprobar</a></li>
					      </ul>
					    </div>		
					    </br>				
					    </br>	
					    </br>	    						    
						<form action="index.php?ctl=aprobar" method="POST" class="col s12" >
							<div class="input-field col s12">
								<input id="id" type="text" name="id" value="<?php echo $_GET['id'] ?>" readonly />
								<label for="id">Id Servicio</label>	
							</div>
							<div class="input-field col s12">
								<select name="valetParking" class="select" required>
							      <option value="" disabled selected>Seleccione Valet Parking</option>
							      <?php foreach ($valetParking as $valet): ?>
							      	<option value="<?php echo $valet['Id'] ?>"><?php echo $valet['Nombre'] ?>p</option>
							      <?php endforeach ?>
								</select>
							</div>	
							<div class="input-field col s12 m6">
								<input type="submit" name="iniciar" value="APROBAR" class="waves-effect waves-light btn grey darken-3 col s12 m4 right "/>	
							</div>
							<div class="input-field col s12 m6">
								<a href="index.php?ctl=servicios&usuario=<?php echo $usuario;?>&nit=<?php echo $datosP['NIT']; ?>" class="waves-effect waves-light btn grey darken-3 col s12 m4">CANCELAR</a>	
							</div>
						</form>	
					</div>		  
				</div>			
			</div>		    
		</div>		
	</div>	
<?php $contenido = ob_get_clean() ?>

<?php include 'plantillaEncargado.php' ?>