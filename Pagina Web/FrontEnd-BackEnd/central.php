<?php
	include_once('scriptsBBDD.php');
	include_once('funciones.php');

	startDB();
	$id = $_GET["id"];
	$hayPosts = $_GET["p"];
	$cargadoPosts = 1;

	echo '<div class="col-lg-6 col-md-11 col-sm-11">';
		echo '<div id="panelPostsInicio" class="panel panel-default">';					  
			if(isset($_COOKIE["log"]) && $_COOKIE["log"] == true){
				if(isset($_COOKIE["rol"]) &&  $_COOKIE["rol"] == 'User'){//usuario
					if($id == 0){
						$mascotas = getMascotasUsuario($_COOKIE["idUsu"]);
						$id =$_COOKIE["idUsu"];
					}else{
						$mascotas = $id;
					}
					if($mascotas->num_rows > 0){
						$row = $mascotas->fetch_assoc();
						$primera = getInfoMascota($row["IDmascota"]);
						$rowPrimera = $primera->fetch_assoc();
						echo '<div class="panel-heading">'.$rowPrimera["Nombre"].'</div>';
						echo '<div class="panel-body panelPosts-mascota">';
							echo '<ul class="media-list">';
								echo '<li class="media">';
									echo'<div class="media-left">';
										echo'<a href="infoMascota_Usu.html">';
	        								echo'<img class="media-object img-rounded" width="100" height="100" src="assets/images/imagenRegistroMascota.jpg" alt="posts1">';
	      								echo'</a>';
									echo'</div>';
									echo'<div class="media-body">';
										echo '<form  method="post" action="subirPublicacion.php?id='.$row["IDmascota"].'" enctype="multipart/form-data">';
											//echo '<img src="assets/images/imagenRegistroMascota.jpg" alt="pots1" id="subir-publicacion-foto">';
											echo '<textarea class="form-control" rows="4" type="text" name="descripcion" ></textarea>';
											//cho '<a id="foto" name="foto" class="boton-peq botonNaranja" href="subirImagen.html">Foto</a>';
											echo '<input id="botonesHeader" class="btn btn-default btn-md" type="file" name="imagen"></input>';
											echo '<input type="submit" id="botonesHeader" class="btn btn-success btn-md"></input>';
										echo '</form>';
									echo '</div>';

								echo '</li>';		
								cargaPublicacionesMascota($row["IDmascota"]);
							echo '</ul>';	
						echo '</div>';
					}
				}else{//premium  tttttttttttttttttttttt
					if($hayPosts == 1){
						$posts = getPostsUsuario($_COOKIE["idUsu"]);
						if($posts->num_rows > 0){
							echo '<div class="cabecera">'.$_COOKIE["nick"].'</div>';
							echo '<ul class="listado-mascotas">';	
							
									cargaPostUsuario($_COOKIE["idUsu"]);
							echo '</ul>';
							$cargadoPosts = 0;
						}
						
					}
					if($cargadoPosts != 0){						
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
											echo '<form  method="post" action="subirPublicacion.php?id='.$row["IDmascota"].'" enctype="multipart/form-data">';
											echo '<img src="assets/images/imagenRegistroMascota.jpg" alt="pots1" id="subir-publicacion-foto">';
											echo '<textarea type="text" name="descripcion" placeholder="Descripcion" id="cuadro-descripcion"></textarea>';
											//cho '<a id="foto" name="foto" class="boton-peq botonNaranja" href="subirImagen.html">Foto</a>';
											echo '<input type="file" class="boton-peq botonNaranja" name="imagen"></input>';
											echo '<input type="submit" id="subir"  class="boton-peq botonNaranja"></input>';
										echo '</form>';
									echo '</li>';
								if($id == 0){
									cargaPublicacionesMascota($row["IDmascota"]);
								}else{
									cargaPublicacionesMascota($id);
								}
				
								echo '</ul>';
							}
					}
					$cargadoPosts = 1;

			echo '<div class="panel-footer">';
	            echo '<div class="btn-group">';
	             
	              cargaCarrusel($_COOKIE["idUsu"]);
	            echo '</div>';
             
          	echo '</div>';
					
				}
			}else{
				echo '<a href="altaUsuario.html" class="boton-grand botonNaranja centro boton-biggr">Registrate</a>';
			}
	echo '</div>';


?>