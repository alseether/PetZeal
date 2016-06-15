<?php
	include_once('scriptsBBDD.php');
	include_once('funciones.php');
	startDB();
	$usu = getInfoUsuario($_COOKIE["idUsu"])->fetch_assoc();
	echo '<form action="./actualizarPerfil.php?masc=false&id='.$_COOKIE["idUsu"].'" method="post" enctype="multipart/form-data" class="col-lg-7 col-md-12 col-sm-12 form-horizontal">';
		echo '<h1>Información del usuario premium</h1>';
				echo '<div class="form-group">';
        			echo '<label class="col-xs-2 control-label" for="inputSuccess">Nombre</label>';
        			echo '<div class="col-xs-10">';
            			echo '<input type="text" id="inputSuccess" class="form-control" placeholder="Escribe tu nombre" name="nombre" value="'.$usu["Nombre"].'"
							autocomplete maxlenght="0" autocomplete maxlenght="50">';
        			echo '</div>';
    			echo '</div>';
    			echo '<div class="form-group">';
        			echo '<label class="col-xs-2 control-label" for="inputSuccess">Nombre de usuario</label>';
        			echo '<div class="col-xs-10">';
            			echo '<input type="text" id="inputSuccess" class="form-control" placeholder="Escribe tu nombre de usuario" name="nick" value="'.$usu["Nick"].'" autocomplete maxlenght="20">';
        			echo '</div>';
    			echo '</div>';
    			echo '<div class="form-group">';
        			echo '<label class="col-xs-2 control-label" for="inputError">Email</label>';
        			echo '<div class="col-xs-10">';
            			echo '<input type="email" id="inputError" class="form-control" placeholder="Escribe tu email" name="email" value="'.$usu["Email"].'">';
        			echo '</div>';
    			echo '</div>';
    			echo '<div class="form-group">';
        			echo '<label class="col-xs-2 control-label" for="inputWarning">Contraseña</label>';
        			echo '<div class="col-xs-10">';
            			echo '<input type="password" id="inputWarning" class="form-control" placeholder="Escribe tu contraseña" name="pwd" value="'.$usu["Password"].'" minlenght="8">';
        			echo '</div>';
    			echo '</div>';
    			echo '<div class="form-group">';
        			echo '<label class="col-xs-2 control-label" for="inputSuccess">C.P.</label>';
        			echo '<div class="col-xs-10">';
            			echo '<input type="text" id="inputSuccess" class="form-control" placeholder="Escribe tu código postal" name="cp" value="'.$usu["CP"].'" minlenght="5">';
        			echo '</div>';
    			echo '</div>';
          echo '<div class="form-group">';
              echo '<label class="col-xs-2 control-label" for="inputSuccess">Dirección</label>';
              echo '<div class="col-xs-10">';
                  echo '<input type="text" id="inputSuccess" class="form-control" placeholder="Escribe tu dirección" name="direccion" value="'.$usu["Direccion"].'" autocomplete maxlenght="80">';
              echo '</div>';
          echo '</div>';
          echo '<div class="form-group">';
            echo '<label class="col-xs-2 control-label" for="inputSuccess">Teléfono</label>';
              echo '<div class="col-xs-10">';
                 echo '<input type="text" id="inputSuccess" class="form-control" placeholder="Escribe tu teléfono" name="tlf" value="'.$usu["Telefono"].'" autocomplete maxlenght="9">';
              echo '</div>';
          echo '</div>';
          echo '<div class="form-group">';
             echo '<label class="col-xs-2 control-label" for="inputSuccess">Ocupación</label>';
              echo '<div class="col-xs-10">';
                  echo '<input type="text" id="inputWarning" class="form-control" placeholder="Escribe tu ocupación" name="ocupacion" value="'.$usu["Ocupacion"].'" minlenght="20">';
              echo '</div>';
          echo '</div>';
          echo '<div class="form-group">';
              echo '<label class="col-xs-2 control-label" for="inputSuccess">Web</label>';
              echo '<div class="col-xs-10">';
                 echo '<input type="text" id="inputError" class="form-control" placeholder="Escribe tu dirección web" name="web" value="'.$usu["Web"].'">';
              echo '</div>';
          echo '</div>';
          echo '<div class="form-group">';
              echo '<label class="col-xs-2 control-label" for="inputSuccess">Descripción</label>';
              echo '<div class="col-xs-10">';
                  echo '<textarea type="text" id="inputSuccess" class="form-control" placeholder="Escribe una breve descripción" name="descripcion" autocomplete maxlenght="50">'.$usu["Descripcion"].'</textarea>';
              echo '</div>';
          echo '</div>';
                    
          echo '<input  class="btn btn-success btn-lg" value="Guardar cambios" type="submit"></input>';
          echo '<button type="button" class="btn btn-lg" data-toggle="modal" data-target="#ventanaBaja">Dar de baja</button>';
			echo '</form>';

      echo '<div class= "col-lg-5 col-md-5 col-sm-11">';
        echo '<img src="'.$usu["Imagen"].'" class="img-thumbnail img-justify" alt="Tu foto" width="150" height="150">';
        echo '<button type="button" class="btn btn-default btn-md" data-toggle="modal" data-target="#ventanaFoto">Cambiar foto</button>';
      echo '</div>';

        echo '<div id="ventanaFoto" class="modal fade" role="dialog">';
          echo '<div class="modal-dialog">';

            echo '<div class="modal-content">';
              echo '<div class="modal-header">';
                echo '<button type="button" class="close" data-dismiss="modal">&times;</button>';
                echo '<h3 class="modal-title">Subir foto</h3>';
              echo '</div>';
              echo '<form action="./actualizarFotoPerfil.php?masc=false&id='.$usu["IDusuario"].'" method="post" enctype="multipart/form-data">';
                echo '<label for="imagen">Imagen:</label>';
                echo '<input type="file" name="imagen"></input>';
                echo '<button type="button" class="botonModal btn btn-default btn-md" data-dismiss="modal">Cancelar</button>';
            
                echo '<input type="submit" class="botonModal btn btn-success btn-md" role="button"value="Subir"></input>';
              echo '</form>';
            echo '</div>';

          echo '</div>';
        echo '</div>';


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


	echo '</form>';
	closeDB();
?>