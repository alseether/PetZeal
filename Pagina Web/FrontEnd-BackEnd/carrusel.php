<?php
	//premiun muestras publicar pots
	echo '<div class="lista-mascotas">';
	if(isset($_SESSION["rol"]) &&  $_SESSION["rol"] == 'prem'){
		echo '<a id="publicar-post"  class="boton-grand botonNaranja" href="inicioConLoginEsp_Post_Publicar.html">Publicar Post</a>';
		//primera imagen de mi posts (foto de perfil)
		echo '<a href="inicioConLoginEsp_Post.html"> <img src="assets/images/oficio.jpg" alt="mascota"></a>';
	}
	do{
		
	    $idMascota = $row["IDmascota"];
	    $url = $row["Imagen"];
	    
	    echo '<a href="inicioConLogin.html"> <img src='.$url.' data-idMascota = '.$idMascota.' alt="mascota"></a>';
	}while ($row = mysql_fetch_assoc($mascotas)); 
	//añadir nueva mascota
	echo '<a href="altaMascota.html">	<img id ="anadir" src="assets/images/anadir-mascota.jpg" alt="añadir"></a>';
	echo '</div>';	
?>
