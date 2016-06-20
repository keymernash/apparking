<?php ob_start() ?>
	<div class="row">
		<div class="col s12">
		<h3 class="white-text"><b><?php echo $datosP['Nombre']; ?></b></h3>
			
				<div class="col s12 card-panel">	
					<div class="card-content">						
						<div class="card-tittle">
							<h4>Administrar Parqueos</h4>
						</div>		
						<div class="row">
						    <div class="col s12">
						      <ul class="tabs">
						        <li class="tab col s3"><a class="active" href="#crear">Registrar</a></li>
						        <li class="tab col s3"><a href="#editar">Dar de Alta</a></li>
						        <li class="tab col s3"><a href="#listar">Listar</a></li>
						      </ul>
						    </div>
						    
						    <div id="crear" class="col s12">
						    	<form class="col s12" action="index.php?ctl=newParqueo" method="POST">	
									<div class="row">
										<div class="input-field col s12 m6">
										  <h5><b>NIT: <?php echo $datosP['NIT']; ?></b></h5>	
										</div>	
										<div class="input-field col s12 m6">
										  <h5>Cupos disponibles: <b><?php echo $datosP['Disponibilidad']; ?></b></h5>	
										</div>									
										<div class="input-field col s12 m12">
										  <input name="nit" type="text" class="validate" hidden value="<?php echo $datosP['NIT']; ?>">	
										</div>
										<div class="input-field col s12 m6">
										  <input name="cedula" type="text" class="validate" required>
										  <label for="cedula">Cédula</label>
										</div>
										<div class="input-field col s12 m6">
										  <input name="placa" type="text" class="validate" required>
										  <label for="placa">Placa Vehiculo</label>
										</div>			  									
									</div>
									<input type="submit" name="entrar" value="CREAR" class="waves-effect waves-light btn grey darken-3 col s12 m2 offset-m5"/>
								</form>
						    </div>
						    <div id="editar" class="col s12">
							    <form class="col s12" action="index.php?ctl=deAlta" method="POST">	
									<div class="row">										  
								        <div class="input-field col s12 m6 offset-m3">
								        	<input name="nit" type="text" class="validate" hidden value="<?php echo $datosP['NIT']; ?>">	
								          <input name="id" type="text" class="validate" required>
										  	<label for="id">Codigo de Parqueo</label>
								        </div>
									</div>
									<input type="submit" name="entrar" value="DAR DE ALTA" class="waves-effect waves-light btn grey darken-3 col s12 m2 offset-m5"/>
								</form>
						    </div>
						    <div id="listar" class="col s12">
						    	<table class="responsive-table bordered striped">
						    		<thead>
						    			<tr>						    				
							    			<th>Codigo</th>
							    			<th>Cedula</th>
							    			<th>Nombre y Apellido</th>
							    			<th>Marca y Modelo</th>
							    			<th>Color</th>
							    			<th>Placa</th>
							    			<th>Hora Entrada</th>
							    			<th>Hora Salida</th>
						    			</tr>
						    		</thead>
						    		<tbody>
						    			<tr>
						    				<td>5645</td>
						    				<td>1065003539</td>
						    				<td>Carlos Salcedo</td>
						    				<td>Mazda 6</td>
						    				<td>Negro</td>
						    				<td>HOY-345</td>
						    				<td>7:50 a.m.</td>
						    				<td>11:55 a.m.</td>
						    			</tr>	
						    			<tr>
						    				<td>5645</td>
						    				<td>1065003539</td>
						    				<td>Carlos Salcedo</td>
						    				<td>Mazda 6</td>
						    				<td>Negro</td>
						    				<td>HOY-345</td>
						    				<td>7:50 a.m.</td>
						    				<td>11:55 a.m.</td>
						    			</tr>
						    			<tr>
						    				<td>5645</td>
						    				<td>1065003539</td>
						    				<td>Carlos Salcedo</td>
						    				<td>Mazda 6</td>
						    				<td>Negro</td>
						    				<td>HOY-345</td>
						    				<td>7:50 a.m.</td>
						    				<td>11:55 a.m.</td>
						    			</tr>
						    			<tr>
						    				<td>5645</td>
						    				<td>1065003539</td>
						    				<td>Carlos Salcedo</td>
						    				<td>Mazda 6</td>
						    				<td>Negro</td>
						    				<td>HOY-345</td>
						    				<td>7:50 a.m.</td>
						    				<td>11:55 a.m.</td>
						    			</tr>		    			
						    		</tbody>
						    	</table>
						    	<ul class="pagination center">
								    <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
								    <li class="active"><a href="#!">1</a></li>
								    <li class="waves-effect"><a href="#!">2</a></li>
								    <li class="waves-effect"><a href="#!">3</a></li>
								    <li class="waves-effect"><a href="#!">4</a></li>
								    <li class="waves-effect"><a href="#!">5</a></li>
								    <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
								  </ul>
						    </div>
					  	</div>				
					</div>		  
				</div>			
	    
		</div>		
	</div>	
<?php $contenido = ob_get_clean() ?>

<?php include 'plantillaEncargado.php' ?>