<?php
 	include_once('scriptsBBDD.php');
 	include_once('funciones.php');
 	startDB();
 	$masc = getInfoMascota($_REQUEST["id"])->fetch_assoc();
 	echo '<form action="./actualizarPerfil.php?masc=true&id='.$masc["IDmascota"].'" method="post" enctype="multipart/form-data" class="formulario col-desktop-7 col-tablet-8 col-phone-12" >';
 		echo '<fieldset>';
 			echo '<legend id="tituloCuadro">Mi mascota</legend>';
 			echo '<div class = "camposDatos col-desktop-6 col-tablet-6 col-phone-12">';
 				echo '<select name="especie" class = "campo">';
 					echo '<option value="anfibio">Anfibio</option>';
 					echo '<option value="ave">Ave</option>';
 					echo '<option value="caballo">Caballo</option>';
 					echo '<option value="gato">Gato</option>';
 					echo '<option value="perro">Perro</option>';
 					echo '<option value="pez">Pez</option>';
 					echo '<option value="reptil">Reptil</option>';
 					echo '<option value="roeador">Roedor</option>';						
 					echo '<option value="otros">Otros</option>';
 				echo '</select><br>';
 				echo '<input class="campo" type="text" name="nombre" placeholder="Nombre" value="'.$masc["Nombre"].'"><br>';
 				echo '<input class="campo" type="text" name="raza" placeholder="Raza" value="'.$masc["Raza"].'"><br>';
 				echo '<input class="campo" type="text" name="edad" placeholder="Fecha de nacimiento" value="'.$masc["Nacimiento"].'"><br>';
 				echo '<textarea class="campo" type="text" name="descripcion" placeholder="Descripcion">'.$masc["Descripcion"].'</textarea>
 					<br>';
 				echo '<input class="boton-grand botonVerde" value="Guardar cambios" type=submit></input>';
 				echo '<a class="boton-grand botonBlanco" href="borraPerfil.php?masc=true&id='.$masc["IDmascota"].'">Dar de baja</a><br>';
 			echo '</div>';
 			echo '<div class= "fotoEsp col-desktop-5 col-tablet-5 col-phone-11">';
 				echo '<div id="fotoPerfilPerro" src='.$masc["Imagen"].'></div>';
 					echo '<a id="botonCambiar" class="boton-grand botonBlanco" href="modificarImagenMascota.html">Cambiar foto</a><br>';
 			echo '</div>';
 		echo '</fieldset>';
 	echo '</form>';
 	closeDB();
 ?> 