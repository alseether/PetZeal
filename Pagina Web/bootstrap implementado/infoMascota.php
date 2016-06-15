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
			echo '<select name="especie" class = "form-control">';
				if($masc["Especie"] == "Anfibio")
					echo '<option selected value="Anfibio">Anfibio</option>';
				else
					echo '<option value="Anfibio">Anfibio</option>';
				if($masc["Especie"] == "Ave")
					echo '<option selected value="Ave">Ave</option>';
				else
					echo '<option value="Ave">Ave</option>';
				if($masc["Especie"] == "Caballo")
					echo '<option selected value="Caballo">Caballo</option>';
				else
					echo '<option value="Caballo">Caballo</option>';
				if($masc["Especie"] == "Gato")
					echo '<option selected value="Gato">Gato</option>';
				else
					echo '<option value="Gato">Gato</option>';
				if($masc["Especie"] == "Perro")
					echo '<option selected value="Perro">Perro</option>';
				else
					echo '<option value="Perro">Perro</option>';
				if($masc["Especie"] == "Pez")
					echo '<option selected value="Pez">Pez</option>';
				else
					echo '<option value="Pez">Pez</option>';
				if($masc["Especie"] == "Reptil")
					echo '<option selected value="Reptil">Reptil</option>';
				else
					echo '<option value="Reptil">Reptil</option>';
				if($masc["Especie"] == "Roedor")
					echo '<option selected value="Roedor">Roedor</option>';
				else
					echo '<option value="Roedor">Roedor</option>';	
				if($masc["Especie"] == "Otros")
					echo '<option selected value="Otros">Otros</option>';
				else					
					echo '<option value="Otros">Otros</option>';
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
        echo '<img src="'.$masc["Imagen"].'" class="img-thumbnail img-justify" alt="Tu foto" width="150" height="150">';
        echo '<button type="button" class="btn btn-default btn-md" data-toggle="modal" data-target="#ventanaFoto">Cambiar foto</button>';
	echo '</div>';

	echo '<div id="ventanaFoto" class="modal fade" role="dialog">';
	  echo '<div class="modal-dialog">';

	    echo '<div class="modal-content">';
	      echo '<div class="modal-header">';
	        echo '<button type="button" class="close" data-dismiss="modal">&times;</button>';
	        echo '<h3 class="modal-title">Subir foto</h3>';
	      echo '</div>';
	      echo '<form action="./actualizarFotoPerfil.php?masc=true&id='.$masc["IDmascota"].'" method="post" enctype="multipart/form-data">';
            echo '<label for="imagen">Imagen:</label>';
            echo '<input type="file" name="imagen"></input>';
            echo '<button type="button" class="botonModal btn btn-default btn-md" data-dismiss="modal">Cancelar</button>';
        
            echo '<input type="submit" class="botonModal btn btn-success btn-md" role="button"value="Subir"></input>';
          echo '</form>';
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