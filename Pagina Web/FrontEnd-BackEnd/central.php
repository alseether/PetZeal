<?php
	include_once('scriptsBBDD.php');
	include_once('funciones.php');
	startDB();
	$id = $_GET["id"];
	$hayPosts = $_GET["p"];
	echo '<div class="col-phone-12 col-desktop-6 col-tablet-12">';
		echo '<div id="centrar">';					  
			if(isset($_COOKIE["log"]) && $_COOKIE["log"] == true){
				if(isset($_COOKIE["rol"]) &&  $_COOKIE["rol"] == 'User'){//usuario
					if($num == 0){
						$mascotas = getMascotasUsuario($_COOKIE["idUsu"]);
					}else{
						$mascotas = $num;
					}
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
				}else{//premiun
					if($hayPosts == 0)
						$posts = getPostsUsuario($_COOKIE["idUsu"]);
						if($posts->num_rows > 0){
							echo '<div class="cabecera">'.$_COOKIE["nick"].'</div>';
							echo '<ul class="listado-mascotas">';	
									cargaPostUsuario($_COOKIE["idUsu"]);
							echo '</ul>';
							$cargadoPosts = true;
						}
						
					}
					if($cargadoPosts != true){						
							$mascotas = getMascotasUsuario($_COOKIE["idUsu"]);
							if($mascotas->num_rows > 0){
								$row = $mascotas->fetch_assoc();
								if($id == 0){
									$primera = getInfoMascota($row["IDmascota"]);
									$rowPrimera = $primera->fetch_assoc();
								}else{
									
									$primera = getInfoMascota($id);
									$rowPrimera = $primera->fetch_assoc();
								}
							
								
								echo '<div class="cabecera">'.$rowPrimera["Nombre"].'</div>';
								echo '<ul class="listado-mascotas">';
									echo '<li id="subir-publicacion">';
										echo '<img src="assets/images/imagenRegistroMascota.jpg" alt="pots1" id="subir-publicacion-foto">';
										echo '<textarea type="text" name="descripcion" placeholder="Descripcion" id="cuadro-descripcion"></textarea>';
										echo '<a id="foto"  class="boton-peq botonNaranja" href="subirImagen.html">Foto</a>';
										echo '<a id="subir"  class="boton-peq botonNaranja">Subir</a>';
									echo '</li>';
								if($id == 0){
									cargaPublicacionesMascota($row["IDmascota"]);
								}else{
									cargaPublicacionesMascota($id);
								}
				
								echo '</ul>';
							}
					}
	
				cargaCarrusel($_COOKIE["idUsu"]);
			}else{
				echo '<a href="altaUsuario.html" class="boton-grand botonNaranja centro boton-biggr">Registrate</a>';
			}
	echo '</div>';


?>