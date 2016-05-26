<div class="col-phone-12 col-desktop-6 col-tablet-12">
				<div id="centrar">
						<?php	
							$_SESSION["log"] = true;
							$_SESSION["rol"] = 'prem';
							$_SESSION["hayPubli"] = false;
						    $_SESSION["hayPost"] = true;
						   
							
							//$numPubl=1;
							//$idMascota;

							if(isset($_SESSION["log"]) && $_SESSION["log"] == true){
								
								//getInfoMascota();
						   		
								//$idUsuario=1;/*prueba*/
								if(isset($_SESSION["rol"]) &&  $_SESSION["rol"] == 'usu'){//usuario
									//$mascotas = getMascotasUsuario($idUsuario);
									//$row = mysql_fetch_array($mascotas);
									//mascotas->num_rows;
									//$mascota = getInfoMascota($row["idMascota"]);
									//$rowMascota = mysql_fetch_array($mascota);
									//if($rowMascota->num_rows > 0){
										$_SESSION["hayPubli"] = true;
									//}else{
										//$_SESSION["hayPubli"] = false;
									//}
									if(isset($_SESSION["hayPubli"]) &&  $_SESSION["hayPubli"] == true){//con publicaciones
										include'publiMascotas.php';
									}else{//sin publicaciones
										include'sinPubliMascotas.php';
									}
								}else{
									//$posts = getPostsUsuario($idUsuario);
									/*if($posts->num_rows > 0){
										$_SESSION["hayPosts"] = true;
									}else{
										$_SESSION["hayPosts"] = false;
									}*/
									if(isset($_SESSION["hayPost"]) &&  $_SESSION["hayPost"] == true){
										
										include'postsPremiun.php';
										
									}else{
										if(isset($_SESSION["hayPubli"]) &&  $_SESSION["hayPubli"] == true){
											include'publiMascotas.php';
										}else{
											include'sinPubliMascotas.php';
										}
									}
								}
							
							}else{
								echo '<a href="altaUsuario.html" class="boton-grand botonNaranja centro boton-biggr">Registrate</a>';
							}
						?>
						
				</div>	