<?php
echo '<div class="cabecera">Toby</div>';
echo '<ul class="listado-mascotas">';
	echo '<li id="subir-publicacion">';
		echo '<img src="assets/images/imagenRegistroMascota.jpg" alt="pots1" id="subir-publicacion-foto">';
		echo '<textarea type="text" name="descripcion" placeholder="Descripcion" id="cuadro-descripcion"></textarea>';
		echo '<a id="foto"  class="boton-peq botonNaranja" href="subirImagen.html">Foto</a>';
		echo '<a id="subir"  class="boton-peq botonNaranja">Subir</a>';
	echo '</li>';

	do{
		$descripcion = $rowMascota["Descripción"];
	    $url = $rowMascota["Imagen"];
		//$row = $resultado->fetch_array();
		echo '<li>';
		echo '<a href="infoMascota_Usu.html"> <img src='.$url.' alt="pots1"></a>';
		echo '<p class="info-list-cont">'.$descripcion.'';
		echo '<input type="button" src="assets/images/borrar.png" class="botonBorrar">';
		echo '<li>';
	}while ($rowMascota = mysql_fetch_array($mascota));
echo '</ul>	';

?>