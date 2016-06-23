<?php
	include_once('scriptsBBDD.php');
	include_once('funciones.php');
	startDB();
	$usu = getInfoUsuario($_REQUEST["id"])->fetch_assoc();
	echo '<div class="panel panel-default col-lg-6 col-md-6 col-sm-6">';
		echo '<fieldset>';
			echo '<div class="panel-heading"><h1>Información de usuario</h1></div>';
			echo '<div class="panel-body col-lg-8 col-md-8 col-sm-12">';
				echo '<h1>'.$usu["Nombre"].'</h1>';
				echo '<h4><b>Nick:</b></h4>';
				echo '<h4>@'.$usu["Nick"].'</h4>';
				echo '<h4><b>Email:</b></h4>';
				echo '<h4>'.$usu["Email"].'</h4>';
				echo '<h4><b>Ocupacion:</b></h4>';
				echo '<h4>'.$usu["Ocupacion"].'</h4>';
				echo '<h4><b>Direccion:</b></h4>';
				echo '<h4>'.$usu["Direccion"].'</h4>';
				echo '<h4><b>CP:</b></h4>';
				echo '<h4>'.$usu["CP"].'</h4>';
				echo '<h4><b>Telefono:</b></h4>';
				echo '<h4>'.$usu["Telefono"].'</h4>';
				echo '<h4><b>Descripcion:</b></h4>';
				echo '<h4>'.$usu["Descripcion"].'</h4>';
				echo '<a href="'.$usu["Web"].'" class="btn btn-link" role="button"><h4>'.$usu["Web"].'</h4></a>';
			echo '</div>';
			echo '<div>';
				echo '<div class = "col-lg-4 col-md-4 col-sm-11">';
					echo '<img src='.$usu["Imagen"].' class="img-rounded" alt="foto '.$usu["Nick"].'" width="200" height="150">';
					if(isset($_COOKIE["log"]) && $_COOKIE["log"] == true)
						echo '<button id="botonesHeader" type="button" class="center-block btn btn-default btn-md" data-toggle="modal" data-target="#ventanaMsn">Mensaje Directo</button>';
				echo '</div>';
			echo '</div>';
		echo '</fieldset>';
	echo '</div>';

	echo '<div class="panel panel-default col-lg-6 col-md-6 col-sm-6">';
		echo '<div class="panel panel-default">';
			echo '<div class="panel-heading"><h2>Posts</h2></div>';
			echo '<div id="panelPosts-mascotaOtro" class="panel-body">';
				echo '<ul class="media-list">';
				$idPosts = getPostsUsuario($usu["IDusuario"]);	
				for($i=0; $i<$idPosts->num_rows; $i++){
					$post = $idPosts->fetch_assoc();
					$datos = getInfoPost($post["IDpost"])->fetch_assoc();
					echo '<li class="media">';
						echo '<div class="media-left">';
							echo '<a href="index.html?dir=true&id='.$usu["IDusuario"].'&np='.$datos["IDpost"].'">';
								echo '<img class="media-object img-rounded" width="100" height="100" src="'.$usu["Imagen"].'" alt="foto '.$usu["Nick"].'">';
							echo '</a>';
						echo '</div>';
						echo '<div class="media-body">';
							if(strlen( $datos["Descripcion"]) > 200){
								echo '<p class="media-heading"><h4><a id="link" type="button" onclick="cargaPost('.$usu["IDusuario"].','.$datos["IDpost"].')">'.$datos["Titulo"].'</a></h4><br>';
								echo substr ( $datos["Descripcion"], 0, 200).'...<a href="index.html?dir=true&id='.$usu["IDusuario"].'&np='.$datos["IDpost"].'">Ver más</a></p>';
							}else{
								echo '<p class="media-heading"><h4><a id="link" href="index.html?dir=true&id='.$usu["IDusuario"].'&np='.$datos["IDpost"].'">'.$datos["Titulo"].'</a></h4><br>';
								echo $datos["Descripcion"].'</p>';
							}
						echo '</div>';
					echo '</li>';
				}
				echo '</ul>';
			echo '</div>';
	echo '</div>';

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
							echo '<textarea class="form-control" rows="3" id="msn" placeholder="Escribe aquí tu mensaje"></textarea>';
						echo '</div>';
						echo '<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>';
						echo '<button type="submit" class="pull-right btn btn-success">Enviar</button>';
					echo '</form>';
				echo '</div>';
			echo '</div>';
		echo '</div>';
	echo '</div>';

	closeDB();
?>
