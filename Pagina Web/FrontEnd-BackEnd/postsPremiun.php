<?php
echo '<div class="cabecera"> Mis Posts</div>';
echo '<ul class="listado-mascotas">';
	for($i = 0; $i< 6;$i++){
		echo '<li>';
			echo '<a href="lectura_post.html"> <img src="assets/images/posts1.jpg" alt="pots1"></a>';
			echo '<p class="info-list-cont">Tienda 100 duros.<br>
				    Ven a comprar a nuestra tienda,<br>
				    tenemos descuentos 50%..</p>';		
			echo '<input type="button" src="assets/images/borrar.png" class="botonBorrar">';
		echo '</li>';
	}

	do{
	$infoPosts = getInfoPost($idPost);
	$titulo = $infoPosts["Titulo"];
	$descripción = $infoPosts["Descripción"];
	//$row = $resultado->fetch_array();
	echo '<li>';
	echo '<a href="infoMascota_Usu.html"></a>';
	echo '<p class="info-list-cont">'.$titulo.'<br>';
	echo '<p class="info-list-cont">'.$descripcion.'';
	echo '<input type="button" src="assets/images/borrar.png" class="botonBorrar">';
	echo '<li>';
	}while ($rowMascota = mysql_fetch_array($posts));//terminar
echo '</ul>';

?>