<?php
	include_once('scriptsBBDD.php');
	include_once('funciones.php');
	startDB();
	$usu = getInfoUsuario($_REQUEST["id"])->fetch_assoc();
	echo '<form action="" method="post" enctype="multipart/form-data"	class="formulario col-desktop-7 col-tablet-8 col-phone-12">';
		echo '<fieldset>';
			echo '<legend id="tituloCuadro" >Información del usuario</legend>';
			echo '<div class="camposDatos col-desktop-6 col-tablet-6 col-phone-12">	';		
				echo '<label class="info">'.$usu["Nombre"].'</label><br>';
				echo '<label class="info">'.$usu["Nick"].'</label><br>';
				echo '<label class="info">'.$usu["Ocupacion"].'</label><br>';				
				echo '<label class="info">'.$usu["Email"].'</label><br>';
				echo '<label class="info">'.$usu["CP"].'</label><br>';
				echo '<label class="info">'.$usu["Direccion"].'</label><br>';
				echo '<label class="info">'.$usu["Telefono"].'</label><br>';
				echo '<label class="info">'.$usu["Descripcion"].'<br>';
				echo '<a class="info" href = "'.$usu["Web"].'">'.$usu["Web"].'</a><br>';
			echo '</div>';
			echo '<div class = "fotoEsp col-desktop-5 col-tablet-5 col-phone-11">';
				echo '<div id="fotoPerfilOficio" src='.$usu["Imagen"].'></div>';
				echo '<a id="botonCambiar" class="boton-grand botonBlanco" href="infoEspecialista_Otro_msn.html">Mensaje Directo</a><br>';
			echo '</div>';
		echo '</fieldset>';
	echo '</form>';
	closeDB();
?>