<?php
	include_once('scriptsBBDD.php');
	include_once('funciones.php');

	startDB();
	$id = $_GET["id"];
	$hayPosts = $_GET["p"];
	$cargadoPosts = 1;
	$contenido = false;

	echo '<div class="div-cuerpo col-lg-6 col-md-11 col-sm-11">';
		echo '<div id="panelPostsInicio" class="panel panel-default">';					  
			if(isset($_COOKIE["log"]) && $_COOKIE["log"] == true){
				if(isset($_COOKIE["rol"]) &&  $_COOKIE["rol"] == 'User'){//usuario
					if($id == 0){
						$mascotas = getMascotasUsuario($_COOKIE["idUsu"]);
						//$id =$_COOKIE["idUsu"];
					}else{
						$mascotas =  getInfoMascota($id);
					}
					$row = $mascotas->fetch_assoc();
					if($id == 0){
						$primera = getInfoMascota($row["IDmascota"]);
						$rowPrimera = $primera->fetch_assoc();
					}else{
						
						$primera = getInfoMascota($id);
						$rowPrimera = $primera->fetch_assoc();
					}
					/*if($mascotas->num_rows > 0){
						$contenido = true;
						$row = $mascotas->fetch_assoc();
						$primera = getInfoMascota($row["IDmascota"]);
						$rowPrimera = $primera->fetch_assoc();*/
						echo '<div class="panel-heading "><h2>'.$rowPrimera["Nombre"].'</h2></div>';
						echo '<div class="panel-body panelPosts-mascota">';
							echo '<ul class="media-list">';
								/*echo '<li class="media">';
									echo'<div class="media-left">';
										echo'<a href="info.html?masc=true&id='.$rowPrimera["IDmascota"].'">';
	        								echo'<img class="media-object img-rounded" width="100" height="100" src="assets/images/imagenRegistroMascota.jpg" alt="posts1">';
	      								echo'</a>';
									echo'</div>';
									
								echo '</li>';*/
								echo '<li class="media">';
									echo'<div class="media-left">';
										echo'<a href="info.html?masc=true&id='.$row["IDmascota"].'">';
	        								echo'<img class="media-object img-rounded" width="100" height="100" src="'.$rowPrimera["Imagen"].'" alt="posts1">';
	      								echo'</a>';
									echo'</div>';
									echo'<div class="media-body">';
										echo '<form  method="post" action="subirPublicacion.php?id='.$row["IDmascota"].'" enctype="multipart/form-data">';
											//echo '<img src="assets/images/imagenRegistroMascota.jpg" alt="pots1" id="subir-publicacion-foto">';
											echo '<textarea class="form-control" rows="4" type="text" name="descripcion" placeholder="Escribe tu publicacion..."></textarea>';
											//cho '<a id="foto" name="foto" class="boton-peq botonNaranja" href="subirImagen.html">Foto</a>';
											echo '<input type="file" name="imagen"></input>';
											echo '<input type="submit" id="botonesHeader" class="pull-right btn btn-success btn-md"></input>';
										echo '</form>';
									echo '</div>';
									echo '<hr></hr>';
								echo '</li>';		
								if($id == 0){
									cargaPublicacionesMascota($row["IDmascota"]);
								}else{
									cargaPublicacionesMascota($id);
								}
							echo '</ul>';	
						echo '</div>';
					//}
				}else{//premium  
					if($hayPosts == 1){
						$contenido = true;
						$posts = getPostsUsuario($_COOKIE["idUsu"]);
						$infoUsu = getInfoUsuario($_COOKIE["idUsu"])->fetch_assoc();
						echo '<div class="panel-heading"><h2>'.$_COOKIE["nick"].'</h2></div>';
						echo '<div class="panel-body panelPosts-mascota">';
							echo '<ul class="media-list">';	
								echo '<li class="media">';
		   							echo '<div class="media-left">';
		      							echo '<a href="info.html?masc=false&id='.$_COOKIE["idUsu"].'">';
		        							echo '<img class="media-object img-rounded" width="100" height="100" src="'.$infoUsu["Imagen"].'" alt="especialista">';
		      							echo '</a>';
		    						echo '</div>';
		    						echo'<div class="media-body">';
										echo '<form  method="post" action ="subirPost.php">';
											echo'<h4>Título</h4>';
											echo '<textarea class="form-control" rows="1" type="text" name="titulo" placeholder="Escribe el titulo..."></textarea>';
											echo'<h4>Descripcion</h4>';
											echo '<textarea class="form-control" rows="4" type="text" name="descripcion" placeholder="Escribe el post..."></textarea>';
											echo'<h4>Etiquetas</h4>';
											echo '<textarea class="form-control" rows="1" type="text" name="etiquetas" placeholder="$etiqueta1 $etiqueta2 (máximo 5)" ></textarea>';
											echo '<input  type="submit" style="margin-top: 15px" class="btn btn-success btn-lg pull-right"></input>';
		    							echo '</form>';
									echo '</div>';
									echo '<hr></hr>';
		  						echo '</li>';
						if($posts->num_rows > 0){
							cargaPostUsuario($_COOKIE["idUsu"]);
							
						}
						$cargadoPosts = 0;
						echo '</ul>';
						echo '</div>';
						
					}
					if($cargadoPosts != 0){						
							$mascotas = getMascotasUsuario($_COOKIE["idUsu"]);
							if($mascotas->num_rows > 0){
								$contenido = true;
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
													echo'<a href="info.html?masc=true&id='.$rowPrimera["IDmascota"].'">';
				        								echo'<img class="media-object img-rounded" width="100" height="100" src="'.$rowPrimera["Imagen"].'" alt="posts1">';
				      								echo'</a>';
												echo'</div>';
												echo'<div class="media-body">';
													echo '<form  method="post" action="subirPublicacion.php?id='.$rowPrimera["IDmascota"].'" enctype="multipart/form-data">';
														//echo '<img src="assets/images/imagenRegistroMascota.jpg" alt="pots1" id="subir-publicacion-foto">';
														echo '<textarea class="form-control" rows="4" type="text" name="descripcion" placeholder="Escribe la descripcion..."></textarea>';
														//cho '<a id="foto" name="foto" class="boton-peq botonNaranja" href="subirImagen.html">Foto</a>';
														echo '<input type="file" name="imagen"></input>';
														echo '<input type="submit" id="botonesHeader" class="pull-right btn btn-success btn-md"></input>';
													echo '</form>';
												echo '</div>';
												echo '<hr></hr>';
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
				echo '<a id="botonRegistrate" href="registro.html?pr=false" type="button" class="col-md-offset-4 col-lg-4 btn btn-warning btn-lg" role="button">Regístrate</a>';
			}
		echo '</div>';
	echo '</div>';

?>

