<?php
	include_once('scriptsBBDD.php');
	include_once('funciones.php');
	startDB();
	$masc = getInfoMascota($_REQUEST["id"])->fetch_assoc();
	echo '<div action="" class="panel panel-default col-lg-6 col-md-6 col-sm-6">';
		echo '<fieldset>';
			echo '<div class="panel-heading"><h1>Información de la mascota</h1></div>';
			echo '<div class="panel-body col-lg-8 col-md-8 col-sm-12">';
				echo '<h3>'.$masc["Nombre"].'</h3>';
				echo '<h4>'.$masc["Especie"].'</h4>';
				echo '<h4>'.$masc["Raza"].'</h4>';
				echo '<h4>'.$masc["Nacimiento"].'</h4>';
				echo '<h4>'.$masc["Descripcion"].'</h4>';
			echo '</div>';
			echo '<div>';
				echo '<div class = "col-lg-4 col-md-4 col-sm-11">';
					echo '<img src='.$masc["Imagen"].' class="img-rounded" alt="Foto de perfil de la mascota" width="200" height="150">';
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
						echo '<form action="./actualizaLike.php?id='.$datos["IDpublicacion"].'" method="post" enctype="multipart/form-data" class="media-body">';
							echo '<p>'.$datos["Descripcion"].'</p>';
							echo '<div id="botonesHeader" class="btn-group pull-right">';
								echo '<span id="botonesHeader" class="btn btn-default">'.$datos["Likes"].'</span>';
								echo '<button type="submit" class="btn btn-md glyphicon glyphicon-heart"></button>';
							echo '</div>';
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
	echo '</div>';

?>