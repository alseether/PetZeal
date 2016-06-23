<?php
	include_once('scriptsBBDD.php');
	include_once('funciones.php');
	startDB();
	$masc = getInfoMascota($_REQUEST["id"])->fetch_assoc();
	echo '<div action="" class="panel panel-default col-lg-6 col-md-6 col-sm-6">';
		echo '<fieldset>';
			echo '<div class="panel-heading"><h1>Información de la mascota</h1></div>';
			echo '<div class="panel-body col-lg-8 col-md-8 col-sm-12">';
				echo '<h1>'.$masc["Nombre"].'</h1>';
				echo '<h4><b>Especie:</b></h4>';
				echo '<h4>'.$masc["Especie"].'</h4>';
				echo '<h4><b>Raza:</b></h4>';
				echo '<h4>'.$masc["Raza"].'</h4>';
				echo '<h4><b>Fecha de nacimiento:</b></h4>';
				echo '<h4>'.$masc["Nacimiento"].'</h4>';
				echo '<h4><b>Descripcion:</b></h4>';
				echo '<h4>'.$masc["Descripcion"].'</h4>';
			echo '</div>';
			echo '<div>';
				echo '<div class = "col-lg-4 col-md-4 col-sm-11">';
					echo '<img src='.$masc["Imagen"].' class="img-rounded" alt="Foto de perfil de la mascota" width="200" height="150">';
					if(isset($_COOKIE["log"]) && $_COOKIE["log"] == true)
						echo '<button id="botonesHeader" type="button" class="center-block btn btn-default btn-md" data-toggle="modal" data-target="#ventanaMsn">Mensaje Directo</button>';
				echo '</div>';
			echo '</div>';
		echo '</fieldset>';
	echo '</div>';

	echo '<div class="panel panel-default col-lg-6 col-md-6 col-sm-6">';
		echo '<div class="panel panel-default">';
			echo '<div class="panel-heading"><h2>Publicaciones</h2></div>';
			echo '<div id="panelPosts-mascotaOtro" class="panel-body">';
				echo '<ul class="media-list">';
				$idPublis = getPublicacionesMascota($masc["IDmascota"]);	
				for($i=0; $i<$idPublis->num_rows; $i++){
					$publi = $idPublis->fetch_assoc();
					$datos = getInfoPublicacion($publi["IDpublicacion"])->fetch_assoc();
					echo '<li class="media">';
						echo '<div class="media-left">';
							echo '<a data-toggle="modal" data-target="#ventanaImagen'.$datos["IDpublicacion"].'">';
							echo '<img class="media-object img-rounded" width="100" height="100" src="'.$datos["Imagen"].'" alt="posts"></img>';
							echo '</a>';
						echo '</div>';
						echo '<form action="meGustaPubli.php?idP='.$datos["IDpublicacion"].'&idMasc='.$masc["IDmascota"].'" method="post" enctype="multipart/form-data" class="media-body">';
							echo '<p>'.$datos["Descripcion"].'</p>';
							if(isset($_COOKIE["log"]) && $_COOKIE["log"] == true){
								echo '<div id="botonesHeader" class="btn-group pull-right">';
									echo '<span id="botonesHeader" class="btn btn-default">'.$datos["Likes"].'</span>';
									echo '<button type="submit" class="btn btn-md glyphicon glyphicon-heart"></button>';
								echo '</div>';
							}
						echo '</form>';
					echo '</li>';
				}	
				echo '</ul>';
			echo '</div>';
		echo '</div>';
	echo '</div>';

	$idPublis = getPublicacionesMascota($masc["IDmascota"]);	
	for($i=0; $i<$idPublis->num_rows; $i++){
		$publi = $idPublis->fetch_assoc();
		$datos = getInfoPublicacion($publi["IDpublicacion"])->fetch_assoc();
		echo '<div id="ventanaImagen'.$datos["IDpublicacion"].'" class="modal fade" role="dialog">';
			echo '<div class="modal-dialog">';
				echo '<div class="modal-content">';
					echo '<div class="modal-body">';
						echo '<button type="button" class="close" data-dismiss="modal">&times;</button>';
						echo '<img class="media-object img-rounded" width="500" height="400" src="'.$datos["Imagen"].'" alt="posts"></img>';
					echo '</div>';
				echo '</div>';
			echo '</div>';
		echo '</div>';
	}

	/*
	echo '<div id="ventanaMsn" class="modal fade" role="dialog">';
		echo '<div class="modal-dialog">';
			echo '<div class="modal-content">';
				echo '<div class="modal-header">';
					echo '<button type="button" class="close" data-dismiss="modal">&times;</button>';
					echo '<h4 class="modal-title">Nuevo mensaje privado</h4>';
				echo '</div>';
				echo '<div class="modal-body">';
					echo '<form action="" method="get" role="form">';
						echo '<div class="form-group">';
							echo '<label for="nick">Mensaje a:</label>';
							echo '<input type="text" class="form-control" id="nick" placeholder="@nombreDeUsuario">';
						echo '</div>';
						echo '<div class="form-group">';
							echo '<label for="msn"></label>';
							echo '<textarea class="form-control" rows="3" id="msn" placeholder="Escribe aquí tu mensaje..."></textarea>';
						echo '</div>';
						echo '<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>';
						echo '<button type="submit" class="pull-right btn btn-success">Enviar</button>';
					echo '</form>';
				echo '</div>';
			echo '</div>';
		echo '</div>';
	echo '</div>';*/

?>

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
	        <form action="enviarMensaje.php" method="get" role="form">
			  <div class="form-group col-lg-6">
			    <label for="emisor">Mensaje de:</label>
			        <select name = "emisor" class = "form-control">
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
			    <input type="text" name="receptor" class="form-control" id="receptor" placeholder="mascota@usuario">
			  </div>
			  <div class="form-group">
			    <label for="asunto"></label>
			    <input type="text" name="asunto" class="form-control" id="asunto" placeholder="Asunto">
			  </div>
			<div class="form-group">
			  <label for="contenido"></label>
			  <textarea name="contenido" class="form-control" rows="3" id="contenido" placeholder="Escribe aqui tu mensaje..."></textarea>
			</div>
			  <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
			  <button type="submit" class="pull-right btn btn-success">Enviar</button>
			</form>
	      </div>
	    </div>

	  </div>
	</div>