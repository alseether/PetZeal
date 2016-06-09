<?php
	include_once('scriptsBBDD.php');
	include_once('funciones.php');
	startDB();
	$usu = getInfoUsuario($_COOKIE["idUsu"])->fetch_assoc();
	echo '<form action="./actualizarPerfil.php?masc=false&id='.$_COOKIE["idUsu"].'" method="post" enctype="multipart/form-data" class="formulario col-desktop-7 col-tablet-8 col-phone-12">';
		echo '<fieldset>';
			echo '<legend id="tituloCuadro" >Información del usuario</legend>';
			echo '<div class="camposDatos col-desktop-6 col-tablet-6 col-phone-12">';
				echo '<input class="campo" type="text" name="nombre" placeholder="Escribe tu nombre" value="'.$usu["Nombre"].'" 
						autocomplete maxlenght="50"/><br>';

				echo '<input class="campo" type="text" name="nick" placeholder="Escribe un nombre de usuario" value="'.$usu["Nick"].'"
						autocomplete maxlenght="50"/><br>';
				
				echo '<input class="campo" type="email" name="email" placeholder="Escribe tu email" value="'.$usu["Email"].'"/><br>';
				
				echo '<input class="campo" type="password" name="pwd" placeholder="Escribe una contraseña" value="'.$usu["Password"].'" minlenght="8"/><br>';
				
				echo '<input class="campo" type="text" name="cp" placeholder="Escribe tu código postal" value="'.$usu["CP"].'" minlenght="5"/><br>';

				echo '<input class="campo" type="text" name="direccion" placeholder="Escribe tu dirección" value="'.$usu["Direccion"].'" minlenght="5"/><br>';

				echo '<input class="campo" type="phone" name="tlf" placeholder="Escribe tu teléfono" value="'.$usu["Telefono"].'" minlenght="5"/><br>';

				echo '<input class="campo" type="text" name="ocupacion" placeholder="Escribe tu ocupacion" value="'.$usu["Ocupacion"].'"
						minlenght="5"/><br>';

				echo '<input class="campo" type="url" name="web" placeholder="Escribe tu página web" value="'.$usu["Web"].'" 
						minlenght="5"/><br>';

				echo '<textarea class="campo" type="text" name="descripcion" placeholder="Descripcion">'.$usu["Descripcion"].'</textarea><br>';

				echo '<div id="botones">';
					echo '<input class="boton-grand botonVerde" value="Guardar cambios" type=submit></input>';
					echo '<a class="boton-grand botonBlanco" href="borraPerfil.php?masc=false&id='.$usu["IDusuario"].'">Dar de baja</a><br>';
				echo '</div>';
			echo '</div>';
			echo '<div class = "fotoEsp col-desktop-5 col-tablet-5 col-phone-11">';
				echo '<div id="fotoPerfilOficio"></div>';
					echo '<a id="botonCambiar" class="boton-grand botonBlanco" href="cambiarFotoEspecialista.html">Cambiar foto</a><br>';
			echo '</div>';
		echo '</fieldset>';
	echo '</form>';
	closeDB();
?>