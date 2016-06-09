<div class="divMensajesMascotas col-desktop-12 col-tablet-12 col-phone-12">

	<?php
		include_once("funciones.php");
		include_once("scriptsBBDD.php");
		
		if(isset($_COOKIE["log"]) && $_COOKIE["log"] == true){
			startDB();
			$mascotas = getMascotasUsuario($_COOKIE["idUsu"]);
			if($mascotas->num_rows > 0){
				echo '<div class="opcionesMascotas"> ';
					echo '<ul class="mastab">';
						for($i = 0; $i < $mascotas->num_rows; $i++){
							$row = $mascotas->fetch_assoc();
							$mascota = getInfoMascota($row["IDmascota"])->fetch_assoc();
							echo '<input type="button" name="masc'.$mascota["IDmascota"].'" value="'.$mascota["Nombre"].'" <a href="#" class="masctablinks boton-grand BotonBlanco" onclick="openTabMasc(event, \'masc'.$mascota["IDmascota"].'\')"/>';
						}
					echo '</ul>';
				echo '</div>';
				
				echo '<div class="contenedorMascotas">';
				$mascotas = getMascotasUsuario($_COOKIE["idUsu"]);
				for($i = 0; $i < $mascotas->num_rows; $i++){
					$row = $mascotas->fetch_assoc();
					$mascota = getInfoMascota($row["IDmascota"])->fetch_assoc();
					echo '<div id="masc'.$mascota["IDmascota"].'" class="mastabcontent">';
						echo '<h3>Mensajes de '.$mascota["Nombre"].'</h3>';
						echo '<div class="divGeneralMensajes col-desktop-12 col-tablet-12 col-phone-12">';
							echo '<div class="opcionesMensajes">';
								echo '<ul class="mentab">';
									echo '<input type="button" name="entrada" value="Bandeja de entrada" <a href="#" class="mentablinks boton-grand botonVerde" onclick="openTabMen(event, \'entrada\')"/>';
									echo '<input type="button" name="salida" value="Bandeja de salida" <a href="#" class="mentablinks boton-grand botonVerde" onclick="openTabMen(event, \'salida\')"/>';
									echo '<input id="botonRedactarCorreo" type="button" name="redactar" value="Redactar" <a href="./mensajeria2.html" class="mentablinks boton-grand botonVerde"/>';
								echo '</ul>';
							echo '</div>';
						
							echo '<div class="contenedorMensajes ">';
								echo '<div id="entrada" class="mentabcontent entrada">';
									echo '<table class="listaMensajes col-desktop-12 col-tablet-12 col-phone-12">';
										echo '<tr><td><h3>Bandeja de entrada</h3></td><td/></tr>';
										$mensajes = getMensajesRecibidos($mascota["IDmascota"]);
										for($j=0; $j < $mensajes->num_rows; $j++){
											$idMensaje = $mensajes->fetch_assoc();
											$mensaje = getInfoMensaje($idMensaje["IDmensaje"])->fetch_assoc();
											$idEmisor = $mensaje["IDemisor"];
											$emisor = getInfoMascota($idEmisor)->fetch_assoc();
											$idDuenoEmisor = $emisor["IDusuario"];
											$nombreDueno = getInfoUsuario($idDuenoEmisor)->fetch_assoc()["Nick"];
											echo '<tr><td><h3> De: <em>'.$emisor["Nombre"].'@'.$nombreDueno.'</em></h></td> <td>Asunto: <em>'.$mensaje["Asunto"].'</em></td></tr>';
										}
									echo '</table>';
								echo '</div>';	// Fin bandeja entrada
							
								echo '<div id="salida" class="mentabcontent salida">';
									echo '<table class="listaMensajes col-desktop-12 col-tablet-12 col-phone-12">';
										echo '<tr><td><h3>Bandeja de salida</h3></td><td/></tr>';
										$mensajes = getMensajesEnviados($mascota["IDmascota"]);
										for($j=0; $j < $mensajes->num_rows; $j++){
											$idMensaje = $mensajes->fetch_assoc();
											$mensaje = getInfoMensaje($idMensaje["IDmensaje"])->fetch_assoc();
											$idReceptor = $mensaje["IDreceptor"];
											$receptor = getInfoMascota($idReceptor)->fetch_assoc();
											$idDuenoReceptor = $receptor["IDusuario"];
											$nombreDueno = getInfoUsuario($idDuenoReceptor)->fetch_assoc()["Nick"];
											echo '<tr><td><h3> A: <em>'.$receptor["Nombre"].'@'.$nombreDueno.'</em></h></td> <td>Asunto: <em>'.$mensaje["Asunto"].'</em></td></tr>';
										}
									echo '</table>';
								echo '</div>';	// Fin de la bandeja de salida
							echo '</div>';	// Fin del contenedor de mensajes
						echo '</div>';	// Fin del div general de mensajes
					echo '</div>';	// Fin del divisor para mascota
				}
				echo '</div>';	// Fin del contenedor de mascotas
			}
			closeDB();
		}
	?>
</div>
			
			
