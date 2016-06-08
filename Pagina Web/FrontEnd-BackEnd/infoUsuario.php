<?php
	include_once('scriptsBBDD.php');
	include_once('funciones.php');
	startDB();
	$usu = getInfoUsuario($_COOKIE["idUsu"])->fetch_assoc();
	echo '<form action="./actualizarPerfil.php?masc=false&id='.$_COOKIE["idUsu"].'" method="post" enctype="multipart/form-data" class="formulario col-desktop-7 col-tablet-8 col-phone-12">';
		echo '<fieldset>';
			echo '<legend id="tituloCuadro" >Información del usuario</legend>';
			echo '<div class="camposDatos col-desktop-6 col-tablet-8 col-phone-12">';
				echo '<input class="campo" type="text" name="nombre" placeholder="Escribe tu nombre" value="'.$usu["Nombre"].'"
						autocomplete maxlenght="0"/><br>';

				echo '<input class="campo" type="text" name="nick" placeholder="Escribe un nombre de usuario" value="'.$usu["Nick"].'" autocomplete maxlenght="50"/><br>';
				
				echo '<input class="campo" type="email" name="email" placeholder="Escribe tu email" value="'.$usu["Email"].'"/><br>';
				
				echo '<input class="campo" type="password" name="pwd" placeholder="Escribe una contraseña" value="'.$usu["Password"].'" minlenght="8"/><br>';
				
				echo '<input class="campo" type="text" name="cp" placeholder="Escribe tu código postal" value="'.$usu["CP"].'" minlenght="5"/><br>';
				
				echo '<input class="boton-grand botonVerde" value="Guardar cambios" type=submit></input>';

				echo '<a class="boton-grand botonBlanco" href="borraPerfil.php?masc=false&id='.$usu["IDusuario"].'">Dar de baja</a><br>';
			echo '</div>';
		echo '</fieldset>';
	echo '</form>';
	closeDB();
?>