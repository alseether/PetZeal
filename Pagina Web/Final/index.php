<html>
	<head>
		<title>PetZeal</title>
		<meta charset="utf-8"</meta>
		    <link rel="stylesheet" type="text/css" href="cssreset.css"/>
		  	<link rel="stylesheet" type="text/css" href="estructura.css" />
		 	<link rel="stylesheet" type="text/css" href="interfaz.css"/>
		 	<script src="funciones.js"></script>
		
	</head>
	<body id="cuerpo-principal">
		<?php include 'cabecera.php';?>
		<div class="div-cuerpo">
			<div class="col-phone-12 col-desktop-3 col-tablet-12">
				<div class="cabecera"> Posts</div>
				<ul class="listado">
							
					<li>
						<a href="infoEspecialista_Otro_SinLogin.html"> <img src="assets/images/julio.jpg" alt="pots1"></a>
						<a href="lectura_post_SinLogin.html"><p class="info-list-cont">Julito pan<br>
							    Evento:Fabricar pan para tortugas<br>
							    Me ofrezco a enseñar hacer..</p></a>							
					</li>
					<li>
						<a href="infoEspecialista_Otro_SinLogin.html"><img src="assets/images/cristian.jpg" alt="pots1"></a>
						<a href="lectura_post_SinLogin.html"><p class="info-list-cont">Cristian lider<br>
							    Evento:Paseador de cabras<br>
							    Me ofrezco a pasear cabr..</p></a>							
					</li>
					<li>
						<a href="infoEspecialista_Otro_SinLogin.html"><img src="assets/images/paula.jpg" alt="pots1"></a>
						<a href="lectura_post_SinLogin.html"><p class="info-list-cont">Pablo superlider<br>
							    Evento:Concentración para tortugas<br>
							    Organizo concentración de..</p></a>							
					</li>		
					<li>
						<a href="infoEspecialista_Otro_SinLogin.html"><img src="assets/images/alvaro.jpg" alt="pots1"></a>
						<a href="lectura_post_SinLogin.html"><p class="info-list-cont">Alvaro el ratilla<br>
							    Evento:Limpio ratas<br>
							    Me ofrezco a limpiar ratas..</p></a>							
					</li>
					<li>
						<a href="infoEspecialista_Otro_SinLogin.html"><img src="assets/images/zapi.jpg" alt="pots1"></a>
						<a href="lectura_post_SinLogin.html"><p class="info-list-cont">Zapi el niño<br>
							    Evento:Domador de bufalos<br>
							    Me ofrezco a domar bufalos..</p></a>							
					</li>
				</ul>
			</div>
			<div class="col-phone-12 col-desktop-6 col-tablet-12">
				<div id="centrar">
						<?php	
							$_SESSION["login"] = true;
							$_SESSION["rol"] = 'prem';
							//$_SESSION["hayPubli"] = false;
						    $_SESSION["hayPost"] = true;
						    
							
							$numPubl=1;
							$idMascota;

							if(isset($_SESSION["login"]) && $_SESSION["login"] == true){
								$mascotas = getMascotasUsuario($idUsuario);
								//getInfoMascota();
						   		
								//$idUsuario=1;/*prueba*/
								if(isset($_SESSION["rol"]) &&  $_SESSION["rol"] == 'usu'){//usuario
									$row = mysql_fetch_array($mascotas);
									//mascotas->num_rows;
									$mascota = getInfoMascota($row["idMascota"]);
									$rowMascota = mysql_fetch_array($mascota);
									if($rowMascota->num_rows > 0){
										$_SESSION["hayPubli"] = true;
									}else{
										$_SESSION["hayPubli"] = false;
									}
									if(isset($_SESSION["hayPubli"]) &&  $_SESSION["hayPubli"] == true){//con publicaciones
										include'publiMascotas.php';
									}else{//sin publicaciones
										include'sinPubliMascotas.php';
									}
								}else{
									$posts = getPostsUsuario($idUsuario);
									if($posts->num_rows > 0){
										$_SESSION["hayPosts"] = true;
									}else{
										$_SESSION["hayPosts"] = false;
									}
									if(isset($_SESSION["hayPost"]) &&  $_SESSION["hayPost"] == true){
										
										include'publiMascotas.php';
										
									}else{
										if(isset($_SESSION["hayPubli"]) &&  $_SESSION["hayPubli"] == true){
											include'publiPremiun.php';
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
				
			</div>
			<div class="col-phone-12 col-desktop-3 col-tablet-12 ">
			    <div class="cabecera"> Informacion</div>
				<ul class="listado">
					
					<li>
						<a href="informacion_estatica.html">
							<img src="assets/images/gato.jpg" alt="pots1">
							<h2 class="info-list-cont">Gatos</h2>							
						</a>
					</li>
					<li>
						<a href="informacion_estatica.html">
							<img src="assets/images/perroInfoMascota.jpg" alt="pero">
							<h2 class="info-list-cont">Perros</h2>		
						</a>							
					</li>
					<li>
						<a href="informacion_estatica.html">
							<img src="assets/images/pez.jpg" alt="pots1">
							<h2 class="info-list-cont">Peces</h2>							
						</a>
					</li><li>
						<a href="informacion_estatica.html">
							<img src="assets/images/roedor.jpg" alt="pots1">
							<h2 class="info-list-cont">Roedores</h2>							
						</a>
					</li>
					<li>
						<a href="informacion_estatica.html">
							<img src="assets/images/ave.jpg" alt="pots1">
							<h2 class="info-list-cont">Aves</h2>
						</a>
					</li>		
				</ul>
			</div>
		</div>
	</body>
</html>
