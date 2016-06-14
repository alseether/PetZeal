<?php
 	include_once('scriptsBBDD.php');
 	include_once('funciones.php');
 	startDB();
 	$masc = getInfoMascota($_REQUEST["id"])->fetch_assoc();
 	echo '<form action="./actualizarPerfil.php?masc=true&id='.$masc["IDmascota"].'" method="post" enctype="multipart/form-data" class="col-lg-7 col-md-12 col-sm-12 form-horizontal">';
 		echo '<h1>Mi mascota</h1>';
		echo '<div class="form-group">';
			echo '<label class="col-xs-2 control-label" for="inputSuccess">Especie</label>';
			echo '<div class="col-xs-10">';
			echo '<select class = "form-control">';
				echo '<option value="anfibio">Anfibio</option>';
				echo '<option value="ave">Ave</option>';
				echo '<option value="caballo">Caballo</option>';
				echo '<option value="gato">Gato</option>';
				echo '<option value="perro">Perro</option>';
				echo '<option value="pez">Pez</option>';
				echo '<option value="reptil">Reptil</option>';
				echo '<option value="roedor">Roedor</option>';						
				echo '<option value="otros">Otros</option>';
			echo '</select>';
			echo '</div>';
		echo '</div>';
		echo '<div class="form-group">';
			echo '<label class="col-xs-2 control-label" for="inputSuccess">Nombre</label>';
			echo '<div class="col-xs-10">';
				echo '<input type="text" id="inputSuccess" class="form-control" autocomplete maxlenght="50" name="nombre" value="'.$masc["Nombre"].'">';
			echo '</div>';
		echo '</div>';
		echo '<div class="form-group">';
			echo '<label class="col-xs-2 control-label" for="inputSuccess">Raza</label>';
			echo '<div class="col-xs-10">';
				echo '<input type="text" id="inputSuccess" class="form-control" autocomplete maxlenght="50" name="raza" value="'.$masc["Raza"].'">';
			echo '</div>';
		echo '</div>';
		echo '<div class="form-group">';
			echo '<label class="col-xs-2 control-label" for="inputSuccess">Fecha de nacimiento</label>';
			echo '<div class="col-xs-10">';
				echo '<input type="date" id="inputSuccess" class="form-control" autocomplete maxlenght="50" name="edad" value="'.$masc["Nacimiento"].'">';
			echo '</div>';
		echo '</div>';
		echo '<div class="form-group">';
			echo '<label class="col-xs-2 control-label" for="inputSuccess">Descripción</label>';
			echo '<div class="col-xs-10">';
				echo '<textarea type="text" id="inputSuccess" class="form-control" autocomplete maxlenght="50"> '.$masc["Descripcion"].'</textarea>';
			echo '</div>';
		echo '</div>';
		echo '<input class="btn btn-success btn-lg" value="Guardar cambios" type=submit></input>';
		echo '<button type="button" class="btn btn-lg" data-toggle="modal" data-target="#ventanaBaja">Dar de baja</button>';
	echo '</form>';

	echo '<div class= "col-lg-5 col-md-5 col-sm-11">';
		echo '<img src="assets/images/perroInfoMascota.jpg" class="img-thumbnail img-justify" alt="Imagen de tu mascota" width="150" height="150">';
		echo '<button type="button" class="btn btn-default btn-md" data-toggle="modal" data-target="#ventanaFoto">Cambiar foto</button>';
	echo '</div>';

	echo '<div id="ventanaFoto" class="modal fade" role="dialog">';
	  echo '<div class="modal-dialog">';

	    echo '<div class="modal-content">';
	      echo '<div class="modal-header">';
	        echo '<button type="button" class="close" data-dismiss="modal">&times;</button>';
	        echo '<h3 class="modal-title">Subir foto</h3>';
	      echo '</div>';
	      echo '<div class="modal-body">';
	      	echo 'input type="file" accept="image/jpeg, image/png"/>';
	      	echo '<button type="button" class="botonModal btn btn-default btn-md" data-dismiss="modal">Cancelar</button>';
	      	echo '<a href="noseque.php" type="button" class="botonModal btn btn-success btn-md" role="button">Subir</a>';
	      echo '</div>';
	    echo '</div>';

	  echo '</div>';
	echo '</div>';

	echo '</div>';

	echo '<div id="ventanaBaja" class="modal fade" role="dialog">';
	  echo '<div class="modal-dialog">';

	    echo '<div class="modal-content">';
	      echo '<div class="modal-header">';
	       echo '<button type="button" class="close" data-dismiss="modal">&times;</button>';
	        echo '<h2 class="modal-title">¿Realmente quieres eliminar esta mascota?</h2>';
	      echo '</div>';
	      echo '<div class="modal-body modal-body-justified">';
	      	echo '<button type="button" class="btn btn-default btn-lg btn-success" data-dismiss="modal">NO</button>';
	      	echo '<a href="borraPerfil.php?masc=true&id='.$masc["IDmascota"].'" type="button" class="btn btn-default btn-lg btn-danger" role="button">SI</a>';
	      echo '</div>';
	    echo '</div>';

	  echo '</div>';
	echo '</div>';



 	closeDB();
 ?> 