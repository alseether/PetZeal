<?php
	include_once('scriptsBBDD.php');
	include_once('funciones.php');

	startDB();

	$id = $_GET["id"];
	$numPosts = $_GET["np"];

	echo ' <div class="col-phone-12 col-tablet-12 col-desktop-6">';
	echo ' <div class="caja-posts">';
				//$row = $ultimosPost->fetch_assoc();
				//$infoUsuario = getInfoUsuario($row["IDusuario"]);
				//$rowUsu = $infoUsuario->fetch_assoc();
		echo ' <ul >';
				echo ' <li>';
				echo ' <img src="assets/images/gato.jpg" alt="pots1">';
				echo ' <p id="titulo">Evento: Aqui va el titulo.</p>';		
				echo ' </li>';
				echo ' <li><p> Aquí va el resto de la informacion de un post cualquiera en el que te cuentan su vida y esas cosas tan geniales de la informacion de un post cualquiera</p></li>';

				if(isset($_COOKIE["log"]) && $_COOKIE["log"] == true){

					echo ' <div class="addcomentario">';
					echo ' <li>';
					echo ' <textarea type="text" name="comentario" placeholder="tu comentario..." id="cuadro-comentario"></textarea>';
					echo ' <a id="botonLike" class="boton-peq botonNaranja">Me gusta</a>';
					echo ' <a id="botonComentar" class="boton-peq botonNaranja">Publicar</a>';

					echo ' </li>';
					echo ' </div>';
					echo ' </ul>';
				}
				echo ' </div>';
			
				echo ' <div class="caja-posts">';
				echo ' <ul id="caja-comentario">';
				echo ' <li>';
					echo '		<img src="assets/images/gato.jpg" alt="pots1">';
					echo '		<p id="titulo">wiskas, gato europeo.</p>';
					echo '		<p> Aqui va el comentario del amigo, diciendo los interesante que es tu Post</p></li>';
					echo '		<li><a id="botonLike" class="boton-peq botonNaranja">Me gusta</a>	</li>';

					echo '</ul>';
				echo '</div>';
			echo '</div>';

	closeDB();

?>