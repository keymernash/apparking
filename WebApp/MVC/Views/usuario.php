<?php ob_start() ?>
<div class="row">
	<div class="col s12">
	<h3 class="white-text"><b>Panel de administración</b></h3>
		
			<div class="col s12 card-panel">	
				<div class="card-content">						
					<div class="card-tittle">
						<h4>Administrar Usuarios</h4>
					</div>		
					<div class="row">
					    <div class="col s12">
					      <ul class="tabs">
					        <li class="tab col s3"><a class="active" href="#crear">Crear</a></li>
					        <li class="tab col s3"><a href="#editar">Editar</a></li>
					        <li class="tab col s3"><a href="#eliminar">Eliminar</a></li>
					        <li class="tab col s3"><a href="#listar">Listar</a></li>
					      </ul>
					    </div>
					    <br>
					    <br>
					    <br>
					    <div id="crear" class="col s12">
					    	<form class="col s12" action="index.php?ctl=newUser" method="POST">	
									<div class="row">										
										<div class="input-field col s12 m6">
										  <input name="nombre" type="text" class="validate" required>
										  <label for="nombre">Nombre</label>
										</div>
										<div class="input-field col s12 m6">
										  <input name="apellido" type="text" class="validate" required>
										  <label for="apellido">Apellido</label>
										</div>
										<div class="input-field col s12 m4">
										  <input name="telefono" type="text" class="validate" required>
										  <label for="telefono">Teléfono</label>
										</div>
										<div class="input-field col s12 m4">
										  <input name="email" type="email" class="validate" required>
										  <label for="email">Email</label>
										</div>
										<div class="input-field col s12 m4">
										  <input name="direccion" type="text" class="validate" required> 
										  <label for="direccion">Dirección</label>
										</div>
										<div class="input-field col s12 m4">
										  <input name="usuario" type="text" class="validate" required>
										  <label for="usuario">Usuario</label>
										</div>
										<div class="input-field col s12 m4">
										  <input name="clave" type="password" class="validate" required>
										  <label for="clave">Clave</label>
										</div>		
										<div class="input-field col s12 m4">
										    <select name="tipoUser" required>
												<option value="" disabled selected>Tipo de usuario</option>
												<option value="encargado">Encargado de parqueadero</option>
												<option value="valetparking">Valet parking</option>
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
						          <input name="usuario" type="text" class="validate" required>
										  <label for="usuario">Usuario</label>
						        </div>
									</div>
									<input type="submit" name="entrar" value="BUSCAR" class="waves-effect waves-light btn grey darken-3 col s12 m2 offset-m5"/>
								</form>
					    </div>
					    <div id="eliminar" class="col s12">
						    <form class="col s12" action="" method="POST">	
									<div class="row">										  
						        <div class="input-field col s12 m6 offset-m3">
						          <input name="usuario" type="text" class="validate" required>
										  <label for="usuario">Usuario</label>
						        </div>
									</div>
									<input type="submit" name="entrar" value="ELIMINAR" class="waves-effect waves-light btn grey darken-3 col s12 m2 offset-m5"/>
								</form>
					    </div>
					    <div id="listar" class="col s12">
					    	<table class="responsive-table bordered striped">
					    		<thead>
					    			<tr>						    				
						    			<th>Nombre</th>
						    			<th>Apellido</th>
						    			<th>Email</th>
						    			<th>Usuario</th>
						    			<th>Telefóno</th>
					    			</tr>
					    		</thead>
					    		<tbody>
					    			<tr>
					    				<td>Carlos</td>
					    				<td>Salcedo</td>
					    				<td>ikarloxi@gmail.com</td>
					    				<td>ikarloxi</td>
					    				<td>3136195645</td>
					    			</tr>
					    			<tr>
					    				<td>Carlos</td>
					    				<td>Salcedo</td>
					    				<td>ikarloxi@gmail.com</td>
					    				<td>ikarloxi</td>
					    				<td>3136195645</td>
					    			</tr>
					    			<tr>
					    				<td>Carlos</td>
					    				<td>Salcedo</td>
					    				<td>ikarloxi@gmail.com</td>
					    				<td>ikarloxi</td>
					    				<td>3136195645</td>
					    			</tr>
					    			<tr>
					    				<td>Carlos</td>
					    				<td>Salcedo</td>
					    				<td>ikarloxi@gmail.com</td>
					    				<td>ikarloxi</td>
					    				<td>3136195645</td>
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

<?php include 'plantillaAdmin.php' ?>