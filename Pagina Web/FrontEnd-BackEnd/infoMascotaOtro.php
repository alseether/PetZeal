<?php
	include_once('scriptsBBDD.php');
	include_once('funciones.php');
	startDB();
	$masc = getInfoMascota($_REQUEST["id"])->fetch_assoc();
	echo '<form action="" method="post" enctype="multipart/form-data" class="formulario col-desktop-7 col-tablet-8 col-phone-12" >';
		echo '<fieldset>';
			echo '<legend id="tituloCuadro">Informacion de la mascota</legend>';
			echo '<div class = "camposDatos col-desktop-6 col-tablet-6 col-phone-12">';
				echo '<label class = "info"> '.$masc["Especie"].' </label><br>';
				echo '<label class = "info"> '.$masc["Nombre"].' </label><br> ';
				echo '<label class = "info"> '.$masc["Raza"].' </label><br>';
				echo '<label class = "info"> '.$masc["Nacimiento"].' </label><br>';
				echo '<label class = "info"> '.$masc["Descripcion"].' </label><br>';
			echo '</div>';
			echo '<div class= "fotoEsp col-desktop-5 col-tablet-5 col-phone-11">';
				echo '<div id="fotoPerfilPerro" src='.$masc["Imagen"].'></div>';
					echo '<a id="botonCambiar" class="boton-grand botonBlanco" href="infoMascota_Otro_msn.html">Mensaje Directo</a><br>';
			echo '</div>';
		echo '</fieldset>';
	echo '</form>';
	closeDB();
?>