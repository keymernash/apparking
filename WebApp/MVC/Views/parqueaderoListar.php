<?php ob_start() ?>
<div class="row">
	<div class="col s12">
	<h3 class="white-text"><b>Panel de administración</b></h3>
		
			<div class="col s12 card-panel">	
				<div class="card-content">						
					<div class="card-tittle">
						<h4>Administrar Parqueaderos</h4>
						<a href="index.php?ctl=parqueadero" class="col 1 waves-effect waves-light btn grey darken-3"><i class="material-icons">chevron_left</i>Atras</a>
					</div>		
					<div class="row">
					    <div class="col s12">
					      <ul class="tabs">					      	
					        <li class="tab col s11"><a class="active" href="">Listar</a></li>
					      </ul>
					    </div>
					    <br>
					    <br>
					    <br>					    
					    <div id="listar" class="col s12">
					    	<table class="responsive-table bordered striped">
					    		<thead>
					    			<tr>						    				
						    			<th>Nit</th>
						    			<th>Nombre</th>
						    			<th>Direccion</th>
						    			<th>Capacidad</th>
						    			<th>Longitud</th>
						    			<th>Latitud</th>
						    			<th>¿Valet Parking?</th>
					    			</tr>
					    		</thead>
					    		<tbody>
						    		<?php foreach ($parqueaderos as $parqueadero): ?>
						    			<tr>
						    				<td><?php echo $parqueadero['NIT'] ?></td>
						    				<td><?php echo $parqueadero['Nombre'] ?></td>
						    				<td><?php echo $parqueadero['Direccion'] ?></td>
						    				<td><?php echo $parqueadero['Capacidad'] ?></td>
						    				<td><?php echo $parqueadero['Longitud'] ?></td>
						    				<td><?php echo $parqueadero['Latitud'] ?></td>
						    				<td><?php echo $parqueadero['ValetParking'] ?></td>
						    			</tr>
						    		<?php endforeach ?>					    			
					    		</tbody>
					    	</table>
					    	<ul class="pagination center">
						    	<?php
						    	if ($total_paginas > 1) {
						           if ($pagina != 1)
						              echo '<li class="waves-effect"><a href="index.php?ctl=parkListar&pagina='.($pagina-1).'"><i class="material-icons">chevron_left</i></a></li>';
						              for ($i=1;$i<=$total_paginas;$i++) {
						                 if ($pagina == $i)
						                    //si muestro el índice de la página actual, no coloco enlace
						                    //echo $pagina;
						                    echo '<li class="active waves-effect grey darken-3"><a href="">'.$pagina.'</a></li>';
						                 else
						                    //si el índice no corresponde con la página mostrada actualmente,
						                    //coloco el enlace para ir a esa página
						                    echo ' <li class="waves-effect"><a href="index.php?ctl=parkListar&pagina='.$i.'">'.$i.'</a></li>  ';
						              }
						              if ($pagina != $total_paginas)
						                 echo '<li class="waves-effect"><a href="index.php?ctl=parkListar&pagina='.($pagina+1).'"><i class="material-icons">chevron_right</i></a></li>';
						        }?>							    
							  </ul>
					    </div>
				  	</div>				
				</div>		  
			</div>

	</div>		
</div>	
<?php $contenido = ob_get_clean() ?>

<?php include 'plantillaAdmin.php' ?>