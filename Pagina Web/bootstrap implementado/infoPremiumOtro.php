<?php
	include_once('scriptsBBDD.php');
	include_once('funciones.php');
	startDB();
	$usu = getInfoUsuario($_REQUEST["id"])->fetch_assoc();
	echo '<form action="" method="post" enctype="multipart/form-data"	class="formulario col-desktop-7 col-tablet-8 col-phone-12">';
		echo '<fieldset>';
			echo '<div class="panel-heading"><h1>Información de usuario</h1></div>';
			echo '<div class="panel-body col-lg-8 col-md-8 col-sm-12">';
				echo '<h3>'.$usu["Nombre"].'</h3>';
				echo '<h4>@'.$usu["Nick"].'</h4>';
				echo '<h4>'.$usu["Email"].'</h4>';
				echo '<h4>'.$usu["Ocupacion"].'</h4>';
				echo '<h4>'.$usu["Direccion"].'</h4>';
				echo '<h4>'.$usu["CP"].'</h4>';
				echo '<h4>'.$usu["Telefono"].'</h4>';
				echo '<h4>'.$usu["Descripcion"].'</h4>';
				echo '<a href="'.$usu["Web"].'" class="btn btn-link" role="button"><h4>'.$usu["Web"].'</h4></a>';
			echo '</div>';
			echo '<div>';
				echo '<div class = "col-lg-4 col-md-4 col-sm-11">';
					echo '<img src='.$usu["Imagen"].' class="img-rounded" alt="Foto de perfil del especialista" width="200" height="150">';
					echo '<button id="botonesHeader" type="button" class="center-block btn btn-default btn-md" data-toggle="modal" data-target="#ventanaMsn">Mensaje Directo</button>';
				echo '</div>';
			echo '</div>';
		echo '</fieldset>';

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
	echo '</form>';
	closeDB();
?>
