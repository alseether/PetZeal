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
	
	echo '<div class="panel panel-default col-lg-6 col-md-11 col-sm-11">';
		echo '<div class="panel panel-default">';
			$row = $ultimosPost->fetch_assoc();
			$infoUsuario = getInfoUsuario($id);
			$rowUsu = $infoUsuario->fetch_assoc();
			$infoPost = getInfoPost($numPosts);
			$rowPost = $infoPost->fetch_assoc();
			echo '<div class="panel-heading"><h3>'.$rowPost["Titulo"].'</h3>';
			echo'</div>';		

			echo '<div class="panel-body ">';
				echo ' <ul class="media-list">';
					echo ' <li>';
						echo'<div class="media media-left">';
							echo ' <a href="info.html?masc=false&id='.$row["IDusuario"].'"><img class="media-object img-rounded" width="100" height="100" src="'.$rowUsu["Imagen"].'" alt="foto usuario">';
							echo ' </a>';
							if(isset($_COOKIE["log"]) && $_COOKIE["log"] == true){
								echo'<div class="btn-group">';
									echo ' <form method="post" action ="meGusta.php?idP='.$rowPost["IDpost"].'&idUsu='.$id.'">';
										echo '<span id="botonesHeader" value="'.$rowPost["Likes"].'" class="btn btn-md pull-left btn-default">'.$rowPost["Likes"].'</span>';
										echo '<button type="submit" name ="like" value="'.$rowPost["Likes"].'" id="botonesHeader" class="btn btn-md pull-right glyphicon glyphicon-heart"></button>';
									echo '</form>';
								echo'</div>';
							}
						echo'</div>';
						echo'<div class="media-body">';
							echo ' <p> '.$rowPost["Descripcion"].'</p><br>';
							echo '<h6>Etiquetas: ';
							if($rowPost["Etiqueta1"] != 0){
								$etiqueda = getInfoEtiqueta($rowPost["Etiqueta1"])->fetch_assoc();
								echo '$'.$etiqueda["Etiqueta"].' ';
							}
							if($rowPost["Etiqueta2"] != 0){
								$etiqueda = getInfoEtiqueta($rowPost["Etiqueta2"])->fetch_assoc();
								echo '$'.$etiqueda["Etiqueta"].' ';
							}
							if($rowPost["Etiqueta3"] != 0){
								$etiqueda = getInfoEtiqueta($rowPost["Etiqueta3"])->fetch_assoc();
								echo '$'.$etiqueda["Etiqueta"].' ';
							}
							if($rowPost["Etiqueta4"] != 0){
								$etiqueda = getInfoEtiqueta($rowPost["Etiqueta4"])->fetch_assoc();
								echo '$'.$etiqueda["Etiqueta"].' ';
							}
							if($rowPost["Etiqueta5"] != 0){
								$etiqueda = getInfoEtiqueta($rowPost["Etiqueta5"])->fetch_assoc();
								echo '$'.$etiqueda["Etiqueta"];
							}
							echo '</h6>';
						echo'</div>';
						echo'<div class="media-footer">';
						echo'</div>';
						echo ' </li>';
						if(isset($_COOKIE["log"]) && $_COOKIE["log"] == true){

							echo ' <div class="panel-body col-lg-12 col-md-12 col-sm-12">';
								echo ' <li class="media">';
									echo ' <form method="post" action = "subirComentario.php?idp='.$rowPost["IDpost"].'">';
										echo '<select name ="Nmasc" class = "campo">';
										$infoMascota = getMascotasUsuario($id);
										for ($i = 0; $i < $infoMascota->num_rows; $i++) {
											$infoMascota2 = $infoMascota->fetch_assoc();
											$rowMascota = getInfoMascota($infoMascota2["IDmascota"])->fetch_assoc();
											
												echo '<option value="'.$infoUsuario["IDmascota"].'">'.$rowMascota["Nombre"].'</option>';
										}
										echo '</select><br>';
										echo ' <textarea class ="form-control" rows="4" type="text" name="comentario" placeholder="tu comentario..." id="cuadro-comentario"></textarea>';
										echo ' <input type="submit" id="botonComentar" class="pull-right btn btn-success btn-md"></input>';
									echo ' </form>';
								echo ' </li>';
							echo ' </div>';
					
						}
				echo ' </ul>';
				$infoComent = getComentariosPost($rowPost["IDpost"]);
				$rowComent = $infoComent->fetch_assoc();
				$row2 = getInfoComentario($rowComent["IDcomentario"]);
				if($row2->num_rows >0){
			
			echo '</div>';
			$infoComent = getComentariosPost($rowPost["IDpost"]);
			
			for ($i = 0; $i < $infoComent->num_rows; $i++) {
				$rowComent = $infoComent->fetch_assoc();
				$row2 = getInfoComentario($rowComent["IDcomentario"]);
				$row3 = $row2->fetch_assoc();
				$row4 =  getInfoMascota($row3["IDmascota"]);
				$rowMasc = $row4->fetch_assoc();
				$infoEspecialista = getInfoUsuario($row3["IDespecialista"])->fetch_assoc();
				echo '<div class=" panel-body ">';
					echo ' <ul class="media-list">';
						echo ' <li class="media">';
							echo'<div class="media-left">';
								if($row3["IDmascota"] == 0){
									echo '	<img class="media-object img-rounded" width="100" height="100" src="'.$infoEspecialista["Imagen"].'" alt="pots1jpg">';
								}else{
									echo '	<img class="media-object img-rounded" width="100" height="100" src="'.$rowMasc["Imagen"].'" alt="pots1jpg">';
								}
							echo '</div>';
							echo'<div class="media-body">';
								if($row3["IDmascota"] == 0){
									echo '	<h3 class="media-heading">'.$infoEspecialista["Nick"].'</h3>';
								}else{
									echo '	<h3 class="media-heading">'.$rowMasc["Nombre"].'</h3>';
								}
								echo '	<p>'.$row3["Descripcion"].'</p>';
							echo '</div>';
						echo '</li>';
					echo '</ul>';
				echo '</div>';
			}
		}	
	echo '</div>';
	closeDB();
?>