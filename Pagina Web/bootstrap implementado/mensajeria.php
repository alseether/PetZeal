<div class="div-cuerpo col-lg-12 col-md-12 col-sm-12">

	<?php
		include_once("funciones.php");
		include_once("scriptsBBDD.php");
		
		$correoAbierto = $_REQUEST["corr"];
		
		
		if(isset($_COOKIE["log"]) && $_COOKIE["log"] == true){
			echo '<div class="col-lg-2"> ';
				echo '<ul class="nav nav-pills nav-stacked"> ';
					echo '<li><a class="btn-warning" data-toggle="modal" data-target="#ventanaMsn">Redactar</a></li> ';
			startDB();
			$mascotas = getMascotasUsuario($_COOKIE["idUsu"]);
			if($mascotas->num_rows > 0){
					for($i = 0; $i < $mascotas->num_rows; $i++){
						$row = $mascotas->fetch_assoc();
						$mascota = getInfoMascota($row["IDmascota"])->fetch_assoc();
						if($i == 0){
							echo '<li id="tabM'.$mascota["IDmascota"].'" class="tabMascota active"><a data-toggle="tab" href="#masc'.$mascota["IDmascota"].'">'.$mascota["Nombre"].'</a></li>';
						}
						else{
							echo '<li id="tabM'.$mascota["IDmascota"].'" class="tabMascota"><a data-toggle="tab" href="#masc'.$mascota["IDmascota"].'">'.$mascota["Nombre"].'</a></li>';
						}
					}
					echo '</ul>';
				echo '</div>';
					
				
				echo '<div class="tab-content col-lg-10">';
				
				$mascotas = getMascotasUsuario($_COOKIE["idUsu"]);
				for($i = 0; $i < $mascotas->num_rows; $i++){
					$row = $mascotas->fetch_assoc();
					$mascota = getInfoMascota($row["IDmascota"])->fetch_assoc();
					echo '<div id="masc'.$row["IDmascota"].'" class="tab-pane fade in active">';
							echo '<ul class="nav nav-tabs">';
								echo '<li class="active"><a data-toggle="tab" href="#entrada'.$row["IDmascota"].'">Bandeja de Entrada</a></li>';
								echo '<li><a data-toggle="tab" href="#salida'.$row["IDmascota"].'">Bandeja de Salida</a></li>';
							echo '</ul>';
							echo '<div class="tab-content">';
								echo '<div id="entrada'.$row["IDmascota"].'" class="tab-pane fade in active">';
									echo '<div class="panel-group" id="accordionI'.$row["IDmascota"].'">';
										
									
									$consulta = "select IDmensaje from mensajes WHERE IDreceptor = '".$row["IDmascota"]."' order by IDmensaje desc limit 50";
									$mensajes = query($consulta);
									for($j=0; $j < $mensajes->num_rows; $j++){
										$idMensaje = $mensajes->fetch_assoc();
										$mensaje = getInfoMensaje($idMensaje["IDmensaje"])->fetch_assoc();
										$idEmisor = $mensaje["IDemisor"];
										$emisor = getInfoMascota($idEmisor)->fetch_assoc();
										$idDuenoEmisor = $emisor["IDusuario"];
										$nombreDueno = getInfoUsuario($idDuenoEmisor)->fetch_assoc()["Nick"];
										if($mensaje["IDmensaje"] == $correoAbierto){
											actualizaInfoMensaje($mensaje["IDmensaje"], $mensaje["IDemisor"], $mensaje["IDreceptor"], $mensaje["Asunto"], $mensaje["Fecha"], $mensaje["Contenido"], 1);
											echo '<div class="panel panel-default">';
											echo '<div id="mensajeAcordeon" class="panel-heading" >'; // onclick="openContMenRecibido(event, '.$row["IDmascota"].','.$idMensaje["IDmensaje"].')"
												echo '<h5 class="panel-title">';
													echo '<a data-toggle="collapse" data-parent="#accordionI'.$row["IDmascota"].'" href="#m'.$row["IDmascota"].'in'.$mensaje["IDmensaje"].'">';
															echo '<div class="col-lg-4"> De: '.$emisor["Nombre"].'@'.$nombreDueno.' </div>';
															echo '<div class="col-lg-5"> Asunto: '.$mensaje["Asunto"].' </div>';
															echo '<div class="col-lg-3"> Fecha: '.$mensaje["Fecha"].' </div>';
													echo '</a>';
												
										}
										else{
											if($mensaje["Leido"] == 0){
												echo '<div class="panel panel-success">';
												echo '<div id="mensajeAcordeon" class="panel-heading" >'; // onclick="openContMenRecibido(event, '.$row["IDmascota"].','.$idMensaje["IDmensaje"].')"
												echo '<h5 class="panel-title">';
												echo '<a data-toggle="collapse" data-parent="#accordionI'.$row["IDmascota"].'" href="#m'.$row["IDmascota"].'in'.$mensaje["IDmensaje"].'">';

														echo '<div class="col-lg-4"> De: <em>'.$emisor["Nombre"].'@'.$nombreDueno.'</em> </div>';
														echo '<div class="col-lg-5"> Asunto: <em>'.$mensaje["Asunto"].'</em> </div>';
														echo '<div class="col-lg-3"> Fecha: <em>'.$mensaje["Fecha"].'</em> </div>';
													
												echo '</a>';
												}
											else{
												echo '<div class="panel panel-default">';
												echo '<div id="mensajeAcordeon" class="panel-heading" >'; // onclick="openContMenRecibido(event, '.$row["IDmascota"].','.$idMensaje["IDmensaje"].')"
												echo '<h5 class="panel-title">';
												echo '<a data-toggle="collapse" data-parent="#accordionI'.$row["IDmascota"].'" href="#m'.$row["IDmascota"].'in'.$mensaje["IDmensaje"].'">';
														echo '<div class="col-lg-4"> De: '.$emisor["Nombre"].'@'.$nombreDueno.' </div>';
														echo '<div class="col-lg-5"> Asunto: '.$mensaje["Asunto"].' </div>';
														echo '<div class="col-lg-3"> Fecha: '.$mensaje["Fecha"].' </div>';
												echo '</a>';
											}
										}
												echo '</h5>';
											echo '</div>';	//Cierre del panel-heading
										
											echo '<div id="m'.$row["IDmascota"].'in'.$mensaje["IDmensaje"].'" class="panel-collapse collapse">';
												echo '<div class="panel-body">'.$mensaje["Contenido"].'</div>';
											echo '</div>'; // Cierre del div de contenido del mensaje										
										echo '</div>'; // Cierre de panel default
								 }
							echo '</div>';	// Cierre panel group
					 echo '</div>';	// Cierre de la bandeja de entrada
					
					echo '<div id="salida'.$row["IDmascota"].'" class="tab-pane fade">';
						echo '<div class="panel-group" id="accordionO'.$row["IDmascota"].'">';
							
									
						$consulta = "select IDmensaje from mensajes WHERE IDemisor = '".$row["IDmascota"]."' order by IDmensaje desc limit 50";
							
						$mensajes = query($consulta);
						for($j=0; $j < $mensajes->num_rows; $j++){
							$idMensaje = $mensajes->fetch_assoc();
							$mensaje = getInfoMensaje($idMensaje["IDmensaje"])->fetch_assoc();
							$idReceptor = $mensaje["IDreceptor"];
							$receptor = getInfoMascota($idReceptor)->fetch_assoc();
							$idDuenoReceptor = $receptor["IDusuario"];
							$nombreDueno = getInfoUsuario($idDuenoReceptor)->fetch_assoc()["Nick"];
							echo '<div class="panel panel-default">';
								echo '<div  id="mensajeAcordeon" class="panel-heading">';
									echo '<h5 class="panel-title">';
										echo '<a data-toggle="collapse" data-parent="#accordionO'.$row["IDmascota"].'" href="#m'.$row["IDmascota"].'out'.$mensaje["IDmensaje"].'">';
											echo '<div>';
												echo '<div class="col-lg-4"> De: <em>'.$emisor["Nombre"].'@'.$nombreDueno.'</em> </div>';
												echo '<div class="col-lg-5"> Asunto: <em>'.$mensaje["Asunto"].'</em> </div>';
												echo '<div class="col-lg-3"> Fecha: <em>'.$mensaje["Fecha"].'</em> </div>';
											echo '</div>';
										echo '</a>';
									echo '</h5>';
								echo '</div>'; // Cierre panel heading
								echo '<div id="m'.$row["IDmascota"].'out'.$mensaje["IDmensaje"].'" class="panel-collapse collapse">';
									echo '<div class="panel-body">'.$mensaje["Contenido"].'</div>';
								echo '</div>';	// Cierre del contenido del mensaje
							echo '</div>';	// Cierre de panel default
						}
						echo '</div>'; // Cierre del panel group	  
					echo '</div>'; // Cierre de la bandeja de salida
					
					echo '</div>'; // Cierre del tab-content de mascota
										
				}
				echo '</div>';	// Cierre del contenedor de mascota
			}
			
			echo '</div>'; // Cierre del tab-content general;
			closeDB();
		}
	?>
</div>
			
			
		<!-- Modal -->
	<div id="ventanaMsn" class="modal fade" role="dialog">
	  <div class="modal-dialog">

	    <!-- Modal content-->
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title">Nuevo mensaje privado</h4>
	      </div>
	      <div class="modal-body">
	        <form action="" method="get" role="form">
			  <div class="form-group col-lg-6">
			    <label for="emisor">Mensaje de:</label>
			        <select class = "form-control">
						<?php
							startDB();
							$mascotas = getMascotasUsuario($_COOKIE["idUsu"]);
								for($i = 0; $i < $mascotas->num_rows; $i++){
									$row = $mascotas->fetch_assoc();
									$mascota = getInfoMascota($row["IDmascota"])->fetch_assoc();
									echo '<option value="'.$mascota["IDmascota"].'">'.$mascota["Nombre"].'</option>';
								}
							closeDB();
						?>
					</select>
			  </div>
			  <div class="form-group col-lg-6">
			    <label for="receptor">Mensaje a:</label>
			    <input type="text" class="form-control" id="receptor" placeholder="mascota@usuario">
			  </div>
			  <div class="form-group">
			    <label for="asunto"></label>
			    <input type="text" class="form-control" id="asunto" placeholder="Asunto">
			  </div>
			<div class="form-group">
			  <label for="contenido"></label>
			  <textarea class="form-control" rows="3" id="contenido" placeholder="Escribe aqui tu mensaje..."></textarea>
			</div>
			  <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
			  <button type="submit" class="pull-right btn btn-success">Enviar</button>
			</form>
	      </div>
	    </div>

	  </div>
	</div>
			
