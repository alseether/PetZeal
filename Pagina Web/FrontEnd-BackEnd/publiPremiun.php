<?php
echo '<div class="cabecera">Toby</div>';// poner nombre de mascota
echo '<ul class="listado-mascotas">';
	echo '<li id="subir-publicacion">';
		echo '<img src="assets/images/imagenRegistroMascota.jpg" alt="pots1" id="subir-publicacion-foto">';
		echo '<textarea type="text" name="descripcion" placeholder="Descripcion" id="cuadro-descripcion"></textarea>';
		echo '<a id="foto"  class="boton-peq botonNaranja" href="subirImagen.html">Foto</a>';
		echo '<a id="subir"  class="boton-peq botonNaranja">Subir</a>';
	echo '</li>';

	do{
		//$row = $resultado->fetch_array();
		$url = $row["IDmascota"];
	    $url = $row["Imagen"];
		echo '<li>';
		echo '<a href="infoMascota_Usu.html"> <img src="assets/images/perros-guia2.jpg" alt="pots1"></a>';
		echo '<p class="info-list-cont">Toby descansando.<br>
		    Despues de un paseo con mi dueño,<br>
		    descansando antes de reanurar la marcha..</p>';
		echo '<input type="button" src="assets/images/borrar.png" class="botonBorrar">';
		echo '<li>';
	}while($i = 0; $i< 6;$i++); //($i = 0; $i< 6;$i++)
echo '</ul>	';

?>