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
						$mascotas =  getMascotasUsuario($id);
					}
					if($mascotas->num_rows > 0){
						$row = $mascotas->fetch_assoc();
						$primera = getInfoMascota($row["IDmascota"]);
						$rowPrimera = $primera->fetch_assoc();
						echo '<div class="panel-heading"><h2>'.$rowPrimera["Nombre"].'</h2></div>';
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
								if($id == 0){
									cargaPublicacionesMascota($row["IDmascota"]);
								}else{
									cargaPublicacionesMascota($id);
								}
							echo '</ul>';	
						echo '</div>';
					}
				}else{//premium  
					if($hayPosts == 1){
						$posts = getPostsUsuario($_COOKIE["idUsu"]);
						if($posts->num_rows > 0){
							echo '<div class="panel-heading"><h2>'.$_COOKIE["nick"].'</h2></div>';
							echo '<div class="panel-body panelPosts-mascota">';
								echo '<ul class="media-list">';	
									echo '<li class="media">';
			   							echo '<div class="media-left">';
			      							echo '<a href="infoEspecialista_Usu.html">';
			        							echo '<img class="media-object img-rounded" width="100" height="100" src="assets/images/oficio.jpg" alt="especialista">';
			      							echo '</a>';
			    						echo '</div>';
			    						echo '<div class="media-body">';
			                  				echo '<button type="button" class="btn btn-default btn-lg" data-toggle="modal" data-target="#ventanaPost">Publicar</button>';
			    						echo '</div>';
			  						echo '</li>';
									cargaPostUsuario($_COOKIE["idUsu"]);
								echo '</ul>';
							echo '</div>';
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
							
								
									echo '<div class="panel-heading"><h2>'.$rowPrimera["Nombre"].'</h2></div>';
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
											if($id == 0){
												cargaPublicacionesMascota($row["IDmascota"]);
											}else{
												cargaPublicacionesMascota($id);
											}
										echo '</ul>';	
									echo '</div>';
							}
					}
												
				}
				$cargadoPosts = 1;

					echo '<div class="panel-footer">';
			            echo '<div class="btn-group">'; 
			            	cargaCarrusel($_COOKIE["idUsu"]);
			            echo '</div>';
		          	echo '</div>';
			}else{
				echo '<div class="center-block hidden-md hidden-sm hidden-xs col-lg-6">';
					echo '<a id="botonRegistrate" href="altaUsuario.html" type="button" class="col-lg-12 btn btn-warning btn-lg" role="button">Regístrate</a>';
				echo '</div>';
			}
	echo '</div>';

?>

