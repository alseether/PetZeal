<?php
	include_once('scriptsBBDD.php');
	include_once('funciones.php');
	startDB();

	echo '<div class="col-phone-12 col-desktop-6 col-tablet-12">';
		echo '<div id="centrar">';					  
			if(isset($_COOKIE["log"]) && $_COOKIE["log"] == true){
				if(isset($_COOKIE["rol"]) &&  $_COOKIE["rol"] == 'User'){
					$mascotas = getMascotasUsuario($_COOKIE["idUsu"]);
					if($mascotas->num_rows > 0){
						$row = $mascotas->fetch_assoc();
						$primera = getInfoMascota($row["IDmascota"]);
						$rowPrimera = $primera->fetch_assoc();
						echo '<div class="cabecera">'.$rowPrimera["Nombre"].'</div>';
						echo '<ul class="listado-mascotas">';
							echo '<li id="subir-publicacion">';
								echo '<img src="assets/images/imagenRegistroMascota.jpg" alt="pots1" id="subir-publicacion-foto">';
								echo '<textarea type="text" name="descripcion" placeholder="Descripcion" id="cuadro-descripcion"></textarea>';
								echo '<a id="foto"  class="boton-peq botonNaranja" href="subirImagen.html">Foto</a>';
								echo '<a id="subir"  class="boton-peq botonNaranja">Subir</a>';
							echo '</li>';
							
								cargaPublicacionesMascota($row["IDmascota"]);
							
						echo '</ul>';
					}
				}else{
					$posts = getPostsUsuario($_COOKIE["idUsu"])->fetch_assoc();
					if($posts->num_rows > 0){
						echo '<div class="cabecera">'.$_COOKIE["nick"].'</div>';
						echo '<ul class="listado-mascotas">';
							echo '<li id="subir-publicacion">';
								echo '<img src="assets/images/imagenRegistroMascota.jpg" alt="pots1" id="subir-publicacion-foto">';
								echo '<textarea type="text" name="descripcion" placeholder="Descripcion" id="cuadro-descripcion"></textarea>';
								echo '<a id="foto"  class="boton-peq botonNaranja" href="subirImagen.html">Foto</a>';
								echo '<a id="subir"  class="boton-peq botonNaranja">Subir</a>';
							echo '</li>';
							
								cargaPostUsuario($_COOKIE["idUsu"]);
						echo '</ul>';
					}
					else{
						$mascotas = getMascotasUsuario($_COOKIE["idUsu"]);
						if($mascotas->num_rows > 0){
							$row = $mascotas->fetch_assoc();
							$primera = getInfoMascota($row["IDmascota"]);
							$rowPrimera = $primera->fetch_assoc();
							echo '<div class="cabecera">'.$rowPrimera["Nombre"].'</div>';
							echo '<ul class="listado-mascotas">';
								echo '<li id="subir-publicacion">';
									echo '<img src="assets/images/imagenRegistroMascota.jpg" alt="pots1" id="subir-publicacion-foto">';
									echo '<textarea type="text" name="descripcion" placeholder="Descripcion" id="cuadro-descripcion"></textarea>';
									echo '<a id="foto"  class="boton-peq botonNaranja" href="subirImagen.html">Foto</a>';
									echo '<a id="subir"  class="boton-peq botonNaranja">Subir</a>';
								echo '</li>';
								
									cargaPublicacionesMascota($row["IDmascota"]);
								
							echo '</ul>';
						}
					}
				}
				cargaCarrusel($_COOKIE["idUsu"]);
			}else{
				echo '<a href="altaUsuario.html" class="boton-grand botonNaranja centro boton-biggr">Registrate</a>';
			}
	echo '</div>';


?>