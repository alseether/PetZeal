<?php
	include_once('scriptsBBDD.php');
	include_once('funciones.php');
	startDB();
	$usu = getInfoUsuario($_COOKIE["idUsu"])->fetch_assoc();
	echo '<form action="./actualizarPerfil.php?masc=false&id='.$_COOKIE["idUsu"].'" method="post" enctype="multipart/form-data" class="col-lg-9 col-md-12 col-sm-12 form-horizontal">';
		echo '<h1>Información del usuario</h1>';
		// Lo he quitado porque un usuario solo tiene nick (Alvaro)
		/*
		echo '<div class="form-group">';
			echo '<label class="col-xs-2 control-label" for="inputSuccess">Nombre</label>';
			echo '<div class="col-xs-10">';
				echo '<input type="text" id="inputSuccess" name="nombre" class="form-control" placeholder="Escribe tu nombre" value="'.$usu["Nombre"].'"
					autocomplete maxlenght="0" autocomplete maxlenght="50">';
			echo '</div>';
		echo '</div>';
		*/
		echo '<div class="form-group">';
			echo '<label class="col-xs-2 control-label" for="inputSuccess">Nombre de usuario</label>';
			echo '<div class="col-xs-10">';
				echo '<input type="text" id="inputSuccess" name="nick" class="form-control" placeholder="Escribe tu nombre de usuario" value="'.$usu["Nick"].'" autocomplete maxlenght="20">';
			echo '</div>';
		echo '</div>';
		echo '<div class="form-group">';
			echo '<label class="col-xs-2 control-label" for="inputError">Email</label>';
			echo '<div class="col-xs-10">';
				echo '<input type="email" id="inputError" name="email" class="form-control" placeholder="Escribe tu email" value="'.$usu["Email"].'">';
			echo '</div>';
		echo '</div>';
		echo '<div class="form-group">';
			echo '<label class="col-xs-2 control-label" for="inputSuccess">C.P.</label>';
			echo '<div class="col-xs-10">';
				echo '<input type="text" id="inputSuccess" name="cp" class="form-control" placeholder="Escribe tu código postal" value="'.$usu["CP"].'" minlenght="5">';
			echo '</div>';
		echo '</div>';
		
		echo '<input  class="btn btn-success btn-lg" value="Guardar cambios" type=submit></input>';
		echo '<button type="button" class="btn btn-lg" data-toggle="modal" data-target="#ventanaBaja">Dar de baja</button>';
	echo '</form>';

	
	echo '<div id="ventanaBaja" class="modal fade" role="dialog">';
	  echo '<div class="modal-dialog">';

	    echo '<div class="modal-content">';
	      echo '<div class="modal-header">';
	        echo '<button type="button" class="close" data-dismiss="modal">&times;</button>';
	        echo '<h2 class="modal-title">¿Realmente quieres eliminar este usuario?</h2>';
	      echo '</div>';
	      echo '<div class="modal-body modal-body-justified">';
	      	echo '<button type="button" class="btn btn-default btn-lg btn-success" data-dismiss="modal">NO</button>';
	      	
	      	echo '<a href="borraPerfil.php?masc=false&id='.$usu["IDusuario"].'" type="button" class="btn btn-default btn-lg btn-danger" role="button">SI</a>';
	      echo '</div>';
	    echo '</div>';

	  echo '</div>';
	echo '</div>';

	echo '<div class="col-desktop-5 col-tablet-4 col-phone-12">';
		echo '<a href="registro.html?pr=true" type="button" class="btn btn-warning btn-lg">Convertirse a Premium</butaton>';
	echo '</div>';
	closeDB();
?>