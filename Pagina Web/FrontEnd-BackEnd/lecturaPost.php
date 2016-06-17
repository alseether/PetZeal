<?php
	include_once('scriptsBBDD.php');
	include_once('funciones.php');

	startDB();
	$consulta = "select * from posts order by IDpost desc limit 20";
	$ultimosPost = query($consulta);
	$id = $_GET["id"];
	$numPosts = $_GET["np"];


	$consulta2 = "select * from comentarios order by IDpost desc limit 20";
	$ultimosComent = query($consulta2);
	

	echo '<div class="div-cuerpo col-lg-12 col-md-12 col-sm-12">';
	echo ' <panel panel-default col-lg-6 col-md-11 col-sm-11">';
		$row = $ultimosPost->fetch_assoc();
		$infoUsuario = getInfoUsuario($id);
		$rowUsu = $infoUsuario->fetch_assoc();
		$infoPost = getInfoPost($numPosts);
		$rowPost = $infoPost->fetch_assoc();
			echo '<div class="panel-heading"><h3 class="col-lg-10 col-md-10 col-sm-10">'.$rowPost["Titulo"].'</h3>';
			echo '<button type="submit" id="botonesHeader" class="btn btn-md pull-right glyphicon glyphicon-heart"></button>';
  			echo '	</div>';
			echo ' <div class="caja-posts">';

				echo ' <ul >';
					echo ' <li>';
						echo ' <a href="info.html?masc=false&id='.$row["IDusuario"].'"><img class="media-object img-thumbnail col-lg-3 col-md-3 col-sm-2" width="100" height="100" src="'.$rowUsu["Imagen"].'" alt="foto usuario">';
						//echo ' <p id="titulo">'.$rowPost["Titulo"].'</p>';		
						echo ' </li>';
					echo ' <li><p> '.$rowPost["Descripcion"].'</p></li>';

					if(isset($_COOKIE["log"]) && $_COOKIE["log"] == true){

						echo ' <div id="panelComentarios" class="panel-body col-lg-12 col-md-12 col-sm-12">';
							echo ' <li>';
								echo ' <form method="post" action = "subirComentario.php">';
									echo '<select name ="Nmasc" class = "campo">';
									$infoMascota = getMascotasUsuario($id);
									for ($i = 0; $i < $infoMascota->num_rows; $i++) {
										$infoMascota2 = $infoMascota->fetch_assoc();
										$rowMascota = getInfoMascota($infoMascota2["IDmascota"])->fetch_assoc();
										
											echo '<option value="'.$infoMascota2["IDmascota"].'">'.$rowMascota["Nombre"].'</option>';
									}
									echo '</select><br>';
									
									echo ' <textarea type="text" name="comentario" placeholder="tu comentario..." id="cuadro-comentario"></textarea>';
									echo ' <a id="botonLike" class="boton-peq botonNaranja">Me gusta</a>';
									echo ' <input type="submit" id="botonComentar" class="boton-peq botonNaranja"></input>';
								echo ' </form>';
							echo ' </li>';
						echo ' </div>';
				
					}
					$infoComent = getComentariosPost($rowPost["IDpost"]);
					$rowComent = $infoComent->fetch_assoc();
					$row2 = getInfoComentario($rowComent["IDcomentario"]);
					if($row2->num_rows >0){
				echo ' </ul>';
				echo ' </div>';
				echo ' <div class="caja-posts">';


				$infoComent = getComentariosPost($rowPost["IDpost"]);
				
				for ($i = 0; $i < $infoComent->num_rows; $i++) {
					$rowComent = $infoComent->fetch_assoc();
					$row2 = getInfoComentario($rowComent["IDcomentario"]);
					$row3 = $row2->fetch_assoc();
					$row4 =  getInfoMascota($row3["IDmascota"]);
					$rowMasc = $row4->fetch_assoc();
					$infoEspecialista = getInfoUsuario($row3["IDespecialista"])->fetch_assoc();
					
					echo ' <ul id="caja-comentario">';
					echo ' <li>';
						if($row3["IDmascota"] == 0){
							echo '	<img src="'.$infoEspecialista["Imagen"].'" alt="pots1jpg">';
							echo '	<p id="titulo">'.$infoEspecialista["Nick"].'</p>';
						}else{
							echo '	<img src="'.$rowMasc["Imagen"].'" alt="pots1jpg">';
							echo '	<p id="titulo">'.$rowMasc["Nombre"].'</p>';
						}
						
						echo '	<p>'.$row3["Descripcion"].'</p></li>';
						echo '	<li><a id="botonLike" class="boton-peq botonNaranja">Me gusta</a>	</li>';
					echo '</ul>';
				}
			}

		echo '</div>';
	echo '</div>';
	echo '</div>';
			
	closeDB();

?>