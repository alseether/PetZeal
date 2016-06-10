<?php
	include_once("funciones.php");
	include_once("scriptsBBDD.php");
	echo '<header class = "col-desktop-12 col-tablet-12 col-phone-12" >';
		echo '<a id="logoCabecera" href="index.html"></a>';
		echo '<form id="barraBusqueda" method="get" action="busqueda.html">';
			echo '<input type="text" name="search" placeholder="Buscar: Post - @usuario - @mascota - $etiqueta " id="busquedaEntrada">';
			echo '<input id="lupa" class="col-desktop-1 col-tablet-1 col-phone-1" type="submit" value=""></input>';
		echo '</form>';
		startDB();
		if(isset($_COOKIE["log"]) && $_COOKIE["log"] == true){
			$mascotas = getMascotasUsuario($_COOKIE["idUsu"]);
			$noLeidos = 0;
			for($i =0; $i < $mascotas->num_rows; $i++){
				$masc = $mascotas->fetch_assoc();
				$consulta = "select IDmensaje from mensajes where IDreceptor = '".$masc["IDmascota"] ."'and Leido = 0";
				$correos = query($consulta);
				$noLeidos = $noLeidos + $correos->num_rows;
			}
			debug_to_Console($noLeidos);
			if($noLeidos == 0){
				echo '<a id="logoCorreo" href="mensajeria.html"></a>';
			}	
			else{
				echo '<a id="logoCorreoPendientes" href="mensajeria.html"></a>';
			}
		}
		echo '<div id="camposLogin" >';
			if(isset($_COOKIE["log"]) && $_COOKIE["log"] == true){
				echo '<div id="linea1">';
					echo '<a class="botonLogin botonNaranja" href="info.html?masc=false&id='.$_COOKIE["idUsu"].'">' .$_COOKIE["nick"]. '</a>';
				echo '</div>';
				echo '<div id="linea2">';
					echo '<a id="signup" class="botonLogin botonNaranja" href="logout.php">Salir</a>';
				echo '</div>';
			}
			else{
				echo '<div id="linea1">';
					echo '<input id="login" class="botonLogin botonNaranja" type="button" onclick="viewBox()" value="Iniciar sesion"></input>';
				echo '</div>';
				echo '<div id="linea2">';
					echo '<a id="signup" class="botonLogin botonNaranja" href="registro.php">Registrarse</a>';
				echo '</div>';
			}		
		echo '</div>';
	echo '</header>';
	
	if(!isset($_COOKIE["log"]) || $_COOKIE["log"] == false){
		echo '<form class="cajaCambiarFoto col-desktop-4 col-tablet-4 col-phone-12" method="post" action="login.php">';
			echo '<div class="mensajeConfirmacion">Iniciar sesión</div>';
			echo '<div>';
				echo '<input class="campoLogin" type="text" name="usuario" placeholder="Escribe tu email o nombre de usuario" 
						autocomplete maxlenght="50"/><br>';
				echo '<input class="campoLogin" type="password" name="passwd" placeholder="Escribe tu contraseña" minlenght="8"/><br>';
			echo '</div>';
			echo '<div class="botoneraConfirmacion">';
				echo '<input id="botonHecho"  class ="boton-grand botonVerde col-desktop-5 col-tablet-5 col-phone-11" type="submit" value="Inicial sesion"></input>';
				echo '<input id="cancelar" class="boton-grand botonBlanco col-desktop-5 col-tablet-5 col-phone-11" type="button" value="Cancelar"></input>';
			echo '</div>';
		echo '</form>';
	}
	closeDB();
?>