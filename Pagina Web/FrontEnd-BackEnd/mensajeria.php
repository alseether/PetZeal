<div class="cajaCambiarFoto col-desktop-4 col-tablet-4 col-phone-12">
	<h2> Nuevo mensaje privado </h2>
		<!-- En action, el buscador de usuarios de nuestra web -->
	<form action="enviarMensaje.php?id="" method="get">
		<label class="col-desktop-3 col-tablet-3 col-phone-3"> Mensaje a: </label>
		<input id="buscaUsu" class="col-desktop-9 col-tablet-9 col-phone-9" type="text" name="receptor" value="" />
		<textarea class="col-desktop-12 col-tablet-12 col-phone-12" name="contenido" rows="4" cols="50" placeholder="Escribe tu mensaje aquí..."></textarea>
		<br/>
		<div class="botonesMensaje">
			<a href="mensajeria.html"><input id="botonEnviar" class="boton-grand botonVerde" type="button" name="Enviar" value="Enviar"/></a>
			<a href="mensajeria.html"><input id="botonCancelar" class="boton-grand botonBlanco" type="button" name="Cancelar" value="Cancelar"/></a>
		</div>
	</form>
</div>

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
									echo '<input id="botonRedactarCorreo" type="button" name="redactar" value="Redactar" <a href="#" class="mentablinks boton-grand botonVerde" onclick="mostrarVentanaRedactar()"/>';
								echo '</ul>';
							echo '</div>';
						
							echo '<div class="contenedorMensajes ">';
								echo '<div id="entrada" class="mentabcontent entrada">';
									echo '<table class="listaMensajes col-desktop-12 col-tablet-12 col-phone-12">';
										echo '<tr><td><h3>Bandeja de entrada</h3></td><td/><td/></tr>';
										
										$consulta = "select IDmensaje from mensajes WHERE IDreceptor = '".$row["IDmascota"]."' order by IDmensaje desc limit 50";
										
										$mensajes = query($consulta);
										for($j=0; $j < $mensajes->num_rows; $j++){
											$idMensaje = $mensajes->fetch_assoc();
											$mensaje = getInfoMensaje($idMensaje["IDmensaje"])->fetch_assoc();
											$idEmisor = $mensaje["IDemisor"];
											$emisor = getInfoMascota($idEmisor)->fetch_assoc();
											$idDuenoEmisor = $emisor["IDusuario"];
											$nombreDueno = getInfoUsuario($idDuenoEmisor)->fetch_assoc()["Nick"];
											if($mensaje["Leido"] == 0){
												echo '<tr class="cabeceraMensajeR fondoRojo" onclick="openContMenRecibido(event, \''.$idMensaje["IDmensaje"].'\')">';
											}
											else{
												echo '<tr class="cabeceraMensajeR" onclick="openContMenRecibido(event, \''.$idMensaje["IDmensaje"].'\')">';
											}
											echo '<td> De: <em>'.$emisor["Nombre"].'@'.$nombreDueno.'</em></td> <td>Asunto: <em>'.$mensaje["Asunto"].'</em></td> <td> Fecha: <em>'.$mensaje["Fecha"].'</em></td>';
											echo '</tr>';
											echo '<tr id="'.$mensaje["IDmensaje"].'" class="contenidoMensajeR"><td>'. $mensaje["Contenido"] .' </td><td/><td/></tr>';
										}
									echo '</table>';
								echo '</div>';	// Fin bandeja entrada
							
								echo '<div id="salida" class="mentabcontent salida">';
									echo '<table class="listaMensajes col-desktop-12 col-tablet-12 col-phone-12">';
										echo '<tr><td><h3>Bandeja de salida</h3></td><td/><td/></tr>';
										
										$consulta = "select IDmensaje from mensajes WHERE IDemisor = '".$row["IDmascota"]."' order by IDmensaje desc limit 50";
										
										$mensajes = query($consulta);
										for($j=0; $j < $mensajes->num_rows; $j++){
											$idMensaje = $mensajes->fetch_assoc();
											$mensaje = getInfoMensaje($idMensaje["IDmensaje"])->fetch_assoc();
											$idReceptor = $mensaje["IDreceptor"];
											$receptor = getInfoMascota($idReceptor)->fetch_assoc();
											$idDuenoReceptor = $receptor["IDusuario"];
											$nombreDueno = getInfoUsuario($idDuenoReceptor)->fetch_assoc()["Nick"];
											echo '<tr class="cabeceraMensajeE" onclick="openContMenEnviado(event, \''.$idMensaje["IDmensaje"].'\')"><td><h3> A: <em>'.$receptor["Nombre"].'@'.$nombreDueno.'</em></h></td> <td>Asunto: <em>'.$mensaje["Asunto"].'</em></td> <td> Fecha: <em>'.$mensaje["Fecha"].'</em></td></tr>';
											echo '<tr id="'.$mensaje["IDmensaje"].'" class="contenidoMensajeE"><td>'. $mensaje["Contenido"] .' </td><td/><td/></tr>';
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
			
			
