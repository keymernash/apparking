<?php ob_start() ?>
	<div class="row">
		<div class="col s12">
		<h3 class="white-text"><b><?php echo $datosP['Nombre']; ?></b></h3>
			
				<div class="col s12 card-panel">	
					<div class="card-content">						
						<div class="card-tittle">
							<h4>Administrar Servicios Valet Parking</h4>
						</div>		
						<div class="row">
						    <div class="col s12">
						      <ul class="tabs">
						        <li class="tab col s3"><a class="active" href="#crear">Aprobar</a></li>
						      </ul>
						    </div>
						    
						    <div id="crear" class="col s12">
						    	<table class="responsive-table bordered striped">
					    		<thead>
					    			<tr>						    				
						    			<th>Id</th>
						    			<th>Cedula</th>
						    			<th>Placa</th>
						    			<th>Fecha entrada</th>
						    			<th>Hora entrada</th>
						    			<th>Estado</th>
					    			</tr>
					    		</thead>
					    		<tbody>
						    		<?php foreach ($servicios as $servicio): ?>
						    			<tr>
						    				<td><?php echo $servicio['Id'] ?></td>
						    				<td><?php echo $servicio['Cliente_Cedula'] ?></td>
						    				<td><?php echo $servicio['Placa'] ?></td>
						    				<td><?php echo $servicio['Fecha_entrada'] ?></td>
						    				<td><?php echo $servicio['Hora_entrada'] ?></td>
						    				<td><?php echo $servicio['Estado'] ?></td>
						    				<td><a href="index.php?ctl=aprobarId&id=<?php echo $servicio['Id'] ?>&usuario=<?php echo $usuario;?>&nit=<?php echo $datosP['NIT']; ?>" class="waves-effect waves-light btn grey darken-3 modal-trigger">Aprobar</a></td>
						    				<td>
						    				 <!-- Modal Structure -->
											<div id="<?php echo $servicio['Id'] ?>" class="modal">
												<div class="modal-content">
													<h4>Aprobar Servicio <b><?php echo $servicio['Id'] ?></b></h4>
													<form action="index.php?ctl=aprobar" method="POST" id="my_form">
														<div class="input-field">
															<input type="text" name="id" value="<?php echo $servicio['Id'] ?>"  />	
														</div>
														<div class="input-field">
															<select name="valetParking" class="select">
														      <option value="" disabled selected>Seleccione Valet Parking</option>
														      <?php foreach ($valetParking as $valet): ?>
														      	<option value="<?php echo $valet['Id'] ?>"><?php echo $valet['Nombre'] ?>p</option>
														      <?php endforeach ?>
															</select>
														</div>															
													</form>													
												</div>
												<div class="modal-footer">
													<a href="#!" class=" modal-action modal-close waves-effect waves-grey btn-flat">Cancelar</a>
													<a  href="javascript:{}" onclick="document.getElementById('my_form').submit(); return false;" class=" modal-action modal-close waves-effect waves-grey btn-flat">APROBAR</a>
														
												</div>
											</div>
											</td>
						    			</tr>
						    		<?php endforeach ?>					    			
					    		</tbody>
					    	</table>
						    </div>						    
					  	</div>				
					</div>		  
				</div>			
	    
		</div>		
	</div>	
<?php $contenido = ob_get_clean() ?>

<?php include 'plantillaEncargado.php' ?>