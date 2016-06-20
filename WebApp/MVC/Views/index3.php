<?php ob_start() ?>
	<div class="row">
		<div class="col s12">
		<h3 class="white-text"><b>Mis parqueos</b></h3>			
			<div class="col s12 card-panel">	
				<div class="card-content">						
					<div class="card-tittle">
						<h4>Valet Parking</h4>
					</div>										
				</div>		  
			</div>	    
		</div>		
	</div>	
<?php $contenido = ob_get_clean() ?>

<?php include 'plantillaValet.php' ?>