<?php
$mysqli;
/* Funciones de la base de datos general */
function startDB(){
	global $mysqli;
	$mysqli = new mysqli('localhost', 'root', '', 'petzeal');	
	if (mysqli_connect_errno()){
		echo "Error de conexion: ".mysqli_connect_error();
		exit();
	}
}
function closeDB(){
	global $mysqli;
	$mysqli->close();
}
function query($consulta){
	global $mysqli;
	$ret = $mysqli->query($consulta) or die ($mysqli->error. " en la linea".(__LINE__-1));
	return $ret;
}
/* Funciones de la tabla de usuarios*/
function getIdUsuario($nick){
	global $mysqli;
	$query="SELECT IDusuario FROM usuarios WHERE Nick = '".$nick."' ";
	$ret = $mysqli->query($query) or die ($mysqli->error. " en la linea".(__LINE__-1));
	return $ret;
}
function getInfoUsuario($idUsuario){
	global $mysqli;
	$query="SELECT * FROM usuarios WHERE IDusuario = '".$idUsuario."' ";
	$ret = $mysqli->query($query) or die ($mysqli->error. " en la linea".(__LINE__-1));
	return $ret; 
}
function insertaNuevoUsuario($nick, $password, $email, $rol, $cp, $nombre, $direccion, $telefono, $ocupacion, $web, $descripcion, $imagen){
	global $mysqli;
	$query="INSERT INTO usuarios (Nick, Password, Email, Rol, CP, Nombre, Direccion, Telefono, Ocupacion, Web, Descripcion, Imagen) 
	VALUES ('".$nick."', '".$password."', '".$email."', '".$rol."', '".$cp."', '".$nombre."', '".$direccion."', '".$telefono."', '".$ocupacion."', '".$web."', '".$descripcion."', '".$imagen."')";
	$ret = $mysqli->query($query) or die ($mysqli->error. " en la linea".(__LINE__-1));
}
function actualizaInfoUsuario($idUsuario, $nick, $password, $email, $rol, $cp, $nombre, $direccion, $telefono, $ocupacion, $web, $descripcion, $imagen){
	global $mysqli;
	$query="UPDATE usuarios SET Nick='".$nick."', Password='".$password."' , Email='".$email."', Rol='".$rol."', CP='".$cp."', Nombre='".$nombre."', Direccion='".$direccion."', Telefono='".$telefono."', Ocupacion='".$ocupacion."', Web='".$web."', Descripcion='".$descripcion."', Imagen='".$imagen."'
	WHERE IDusuario='".$idUsuario."'"; 
	$ret = $mysqli->query($query) or die ($mysqli->error. " en la linea".(__LINE__-1));
}
function eliminaUsuario($idUsuario){
	global $mysqli;
	$query="DELETE FROM usuarios WHERE IDusuario='".$idUsuario."'"; 
	$ret = $mysqli->query($query) or die ($mysqli->error. " en la linea".(__LINE__-1));
}
/* Funciones de la tabla de mascotas*/
function getMascotasUsuario($idUsuario){
	global $mysqli;
	$query="SELECT IDmascota FROM mascotas WHERE IDusuario ='".$idUsuario."'";
	$ret = $mysqli->query($query) or die ($mysqli->error. " en la linea".(__LINE__-1));
	return $ret;
}
function getIdMascota($nombreMascota, $idUsuario){
	global $mysqli;
	$query="SELECT IDmascota FROM mascotas WHERE IDusuario = '".$idUsuario."' AND Nombre = '".$nombreMascota."' ";
	$ret = $mysqli->query($query) or die ($mysqli->error. " en la linea".(__LINE__-1));
	return $ret;
}
function getInfoMascota($idMascota){
	global $mysqli;
	$query="SELECT * FROM mascotas WHERE IDmascota LIKE '".$idMascota."'";
	$ret = $mysqli->query($query) or die ($mysqli->error. " en la linea".(__LINE__-1));
	return $ret;
}
function insertaNuevaMascota($nombre, $especie, $raza, $nacimiento, $descripcion, $imagen, $idUsuario){
	global $mysqli;
	$query="INSERT INTO mascotas (Nombre, Especie, Raza, Nacimiento, Descripcion, Imagen, IDusuario) 
	VALUES ('".$nombre."', '".$especie."', '".$raza."', '".$nacimiento."', '".$descripcion."', '".$imagen."', '".$idUsuario."')";
	$ret = $mysqli->query($query) or die ($mysqli->error. " en la linea".(__LINE__-1));
}
function actualizaInfoMascota($idMascota, $nombre, $especie, $raza, $nacimiento, $descripcion, $imagen, $idUsuario){
	global $mysqli;
	$query="UPDATE mascotas SET Nombre='".$nombre."', Especie='".$especie."', Raza='".$raza."', Nacimiento='".$nacimiento."', Descripcion='".$descripcion."', Imagen='".$imagen."', IDusuario='".$idUsuario."'
	WHERE IDmascota='".$idMascota."'"; 
	$ret = $mysqli->query($query) or die ($mysqli->error. " en la linea".(__LINE__-1));
}
function eliminaMascota($idMascota){
	global $mysqli;
	$query="DELETE FROM mascota WHERE IDmascota='".$idMascota."'"; 
	$ret = $mysqli->query($query) or die ($mysqli->error. " en la linea".(__LINE__-1));
}
/* Funciones de la tabla de posts*/
function getPosts(){
	global $mysqli;
	$query="SELECT * FROM posts";
	$ret = $mysqli->query($query) or die ($mysqli->error. " en la linea".(__LINE__-1));
	return $ret;
}
function getPostsUsuario($idUsuario){
	global $mysqli;
	$query="SELECT IDpost FROM posts WHERE IDusuario = '".$idUsuario."'";
	$ret = $mysqli->query($query) or die ($mysqli->error. " en la linea".(__LINE__-1));
	return $ret;
}
function getInfoPost($idPost){
	global $mysqli;
	$query="SELECT * FROM posts WHERE IDpost = '".$idPost."'";
	$ret = $mysqli->query($query) or die ($mysqli->error. " en la linea".(__LINE__-1));
	return $ret;
}
function insertaNuevoPost($titulo, $fecha, $descripcion, $et1, $et2, $et3, $et4, $et5, $likes, $idUsuario){
	global $mysqli;
	$query="INSERT INTO posts (Titulo, Fecha, Descripcion, Etiqueta1, Etiqueta2, Etiqueta3, Etiqueta4, Etiqueta5, IDusuario) 
	VALUES ('".$titulo."', '".$fecha."', '".$descripcion."', '".$et1."', '".$et2."', '".$et3."', '".$et4."', '".$et5."', '".$likes."', '".$idUsuario."')";
	$ret = $mysqli->query($query) or die ($mysqli->error. " en la linea".(__LINE__-1));
}
function actualizaInfoPost($idPost, $titulo, $fecha, $descripcion, $et1, $et2, $et3, $et4, $et5, $likes, $idUsuario){
	global $mysqli;
	$query="UPDATE posts SET Titulo='".$titulo."', Fecha='".$fecha."', Descripcion='".$descripcion."', Etiqueta1='".$et1."', Etiqueta2='".$et2."', Etiqueta3='".$et3."', Etiqueta4='".$et4."', Etiqueta5='".$et5."', Likes='".$likes."', IDusuario='".$idUsuario."'
	WHERE IDpost='".$idPost."'"; 
	$ret = $mysqli->query($query) or die ($mysqli->error. " en la linea".(__LINE__-1));
}
function eliminaPost($idPost){
	global $mysqli;
	$query="DELETE FROM posts WHERE IDpost='".$idPost."'"; 
	$ret = $mysqli->query($query) or die ($mysqli->error. " en la linea".(__LINE__-1));
}
/* Funciones de la tabla de publicaciones*/
function getPublicacionesMascota($idMascota){
	global $mysqli;
	$query="SELECT IDpublicacion FROM publicaciones WHERE IDmascota = '".$idMascota."'";
	$ret = $mysqli->query($query) or die ($mysqli->error. " en la linea".(__LINE__-1));
	return $ret;
}
function getInfoPublicacion($idPublicacion){
	global $mysqli;
	$query="SELECT * FROM publicaciones WHERE IDpublicacion = '".$idPublicacion."'";
	$ret = $mysqli->query($query) or die ($mysqli->error. " en la linea".(__LINE__-1));
	return $ret;
}
function insertaNuevaPublicacion($descripcion, $fecha, $imagen, $likes, $idMascota){
	global $mysqli;
	$query="INSERT INTO publicaciones (Descripcion, Fecha, Imagen, Likes, IDmascota) 
	VALUES ('".$descripcion."', '".$fecha."', '".$imagen."', '".$likes."', '".$idMascota."')";
	$ret = $mysqli->query($query) or die ($mysqli->error. " en la linea".(__LINE__-1));
}
function actualizaInfoPublicacion($idPublicacion, $descripcion, $fecha, $imagen, $likes, $idMascota){
	global $mysqli;
	$query="UPDATE publicaciones SET Descripcion='".$descripcion."', Fecha='".$fecha."', Imagen='".$imagen."', Likes='".$likes."', IDmascota='".$idMascota."'
	WHERE IDpublicacion='".$idPublicacion."'"; 
	$ret = $mysqli->query($query) or die ($mysqli->error. " en la linea".(__LINE__-1));
}
function actualizaFotoPublicacion($foto, $idPublicacion){
	global $mysqli;
	$query="UPDATE publicaciones SET Imagen='".$foto."'
	WHERE IDpublicacion='".$idPublicacion."'"; 
	$ret = $mysqli->query($query) or die ($mysqli->error. " en la linea".(__LINE__-1));
}
function eliminaPublicacion($idPublicacion){
	global $mysqli;
	$query="DELETE FROM publicaciones WHERE IDpublicacion='".$idPublicacion."'"; 
	$ret = $mysqli->query($query) or die ($mysqli->error. " en la linea".(__LINE__-1));
}
/* Funciones de la tabla de comentarios*/
function getComentariosPost($idPost){
	global $mysqli;
	$query="SELECT IDcomentario FROM comentarios WHERE IDpost = '".$idPost."'";
	$ret = $mysqli->query($query) or die ($mysqli->error. " en la linea".(__LINE__-1));
	return $ret;
}
function getInfoComentario($idComentario){
	global $mysqli;
	$query="SELECT * FROM comentarios WHERE IDcomentario = '".$idComentario."'";
	$ret = $mysqli->query($query) or die ($mysqli->error. " en la linea".(__LINE__-1));
	return $ret;
}
function insertaNuevoComentario($fecha, $descripcion, $idMascota, $idEspecialista, $idPost){
	global $mysqli;
	$query="INSERT INTO comentarios (Fecha, Descripcion, IDmascota, IDespecialista, IDpost) 
	VALUES ('".$fecha."', '".$descripcion."', '".$idMascota."', '".$idEspecialista."', '".$idPost."')";
	$ret = $mysqli->query($query) or die ($mysqli->error. " en la linea".(__LINE__-1));
}
function actualizaInfoComentario($idComentario, $fecha, $descripcion, $idMascota, $idEspecialista, $idPost){
	global $mysqli;
	$query="UPDATE comentarios SET Fecha='".$fecha."', Descripcion='".$descripcion."', IDmascota='".$idMascota."', IDespecialista='".$idEspecialista."', IDpost='".$idPost."'
	WHERE IDcomentario='".$idComentario."'"; 
	$ret = $mysqli->query($query) or die ($mysqli->error. " en la linea".(__LINE__-1));
}
function eliminaComentario($idComentario){
	global $mysqli;
	$query="DELETE FROM comentarios WHERE IDcomentario='".$idComentario."'"; 
	$ret = $mysqli->query($query) or die ($mysqli->error. " en la linea".(__LINE__-1));
}
/* Funciones de la tabla de mensajes*/
function getMensajesEnviados($idMascota){
	global $mysqli;
	$query="SELECT IDmensaje FROM mensajes WHERE IDemisor = '".$idMascota."'";
	$ret = $mysqli->query($query) or die ($mysqli->error. " en la linea".(__LINE__-1));
	return $ret;
}
function getMensajesRecibidos($idMascota){
	global $mysqli;
	$query="SELECT IDmensaje FROM mensajes WHERE IDreceptor = '".$idMascota."'";
	$ret = $mysqli->query($query) or die ($mysqli->error. " en la linea".(__LINE__-1));
	return $ret;
}
function getInfoMensaje($idMensaje){
	global $mysqli;
	$query="SELECT * FROM mensajes WHERE IDmensaje = '".$idMensaje."'";
	$ret = $mysqli->query($query) or die ($mysqli->error. " en la linea".(__LINE__-1));
	return $ret;
}
function insertaNuevoMensaje($idEmisor, $idReceptor, $asunto, $fecha, $contenido, $leido){
	global $mysqli;
	$query="INSERT INTO mensajes (IDemisor, IDreceptor, Asunto, Fecha, Contenido, Leido) 
	VALUES ('".$idEmisor."', '".$idReceptor."', '".$asunto."', '".$fecha."', '".$contenido."', '".$leido."')";
	$ret = $mysqli->query($query) or die ($mysqli->error. " en la linea".(__LINE__-1));
}
function actualizaInfoMensaje($idMensaje, $idEmisor, $idReceptor, $asunto, $fecha, $contenido, $leido){
	global $mysqli;
	$query="UPDATE mensajes SET IDemisor='".$idEmisor."', IDreceptor='".$idReceptor."', Asunto='".$asunto."', Fecha='".$fecha."', Contenido='".$contenido."', Leido='".$leido."'
	WHERE IDmensaje='".$idMensaje."'"; 
	$ret = $mysqli->query($query) or die ($mysqli->error. " en la linea".(__LINE__-1));
}
function eliminaMensaje($idMensaje){
	global $mysqli;
	$query="DELETE FROM mensajes WHERE IDmensajes='".$idMensaje."'"; 
	$ret = $mysqli->query($query) or die ($mysqli->error. " en la linea".(__LINE__-1));
}
/* Funciones de la tabla de etiquetas*/
function getInfoEtiqueta($idEtiqueta){
	global $mysqli;
	$query="SELECT * FROM etiquetas WHERE IDetiqueta = '".$idEtiqueta."'";
	$ret = $mysqli->query($query) or die ($mysqli->error. " en la linea".(__LINE__-1));
	return $ret;
}
function insertaNuevaEtiqueta($etiqueta, $usos){
	global $mysqli;
	$query="INSERT INTO etiquetas (Etiqueta, Usos) 
	VALUES ('".$etiqueta."', '".$usos."')";
	$ret = $mysqli->query($query) or die ($mysqli->error. " en la linea".(__LINE__-1));
}
function actualizaInfoEtiqueta($idEtiqueta, $etiqueta, $usos){
	global $mysqli;
	$query="UPDATE etiquetas SET Etiqueta='".$etiqueta."', Usos='".$usos."')
	WHERE IDetiqueta='".$idEtiqueta."'"; 
	$ret = $mysqli->query($query) or die ($mysqli->error. " en la linea".(__LINE__-1));
}
function eliminaEtiqueta($idEtiqueta){
	global $mysqli;
	$query="DELETE FROM etiquetas WHERE IDetiqueta='".$idEtiqueta."'"; 
	$ret = $mysqli->query($query) or die ($mysqli->error. " en la linea".(__LINE__-1));
}
/* Funciones de la tabla de salt*/
function getSaltUsuario($idUsuario){
	global $mysqli;
	$query="SELECT Salt FROM salt WHERE IDusuario = '".$idUsuario."'";
	$ret = $mysqli->query($query) or die ($mysqli->error. " en la linea".(__LINE__-1));
	return $ret;
}
function insertaNuevaSalt($idUsuario, $salt){
	global $mysqli;
	$query="INSERT INTO salt (IDusuario, Salt) 
	VALUES ('".$idUsuario."', '".$salt."')";
	$ret = $mysqli->query($query) or die ($mysqli->error. " en la linea".(__LINE__-1));
}
/* Funciones de busqueda */
function getIdEtiqueta($nombre){
	global $mysqli;
	$query="SELECT IDetiqueta FROM etiquetas WHERE Etiqueta = '".$nombre."' ";
	$ret = $mysqli->query($query) or die ($mysqli->error. " en la linea".(__LINE__-1));
	return $ret;
}
function buscaPalabras($palabra, $len){
	global $mysqli;
	$query = "SELECT * FROM posts WHERE Titulo LIKE '%".$palabra[0]."%'";
	for ($i = 1; $i < $len; $i++) {
    	$query .= "AND Titulo LIKE '%".$palabra[$i]."%'";
	}
	$ret = $mysqli->query($query) or die ($mysqli->error. " en la linea".(__LINE__-1));
	return $ret;
}
function buscaEtiquetas($palabra, $len){
	global $mysqli;
	$num = 0;
	for ($i = 0; $i < $len; $i++){
		$array = str_split($palabra[$i]);
		unset($array[0]);
		$row = getIdEtiqueta(implode($array));
		if($row->num_rows > 0){
			$row = $row->fetch_assoc();
			$etiqueta[$num] = $row["IDetiqueta"];
			$num++;
		}
	}
	if($num > 0)
		$query = "SELECT * FROM posts WHERE Etiqueta1 = ".$etiqueta[0]." ";
	else
		$query = "SELECT * FROM posts WHERE Etiqueta1 = 0";
	for ($i = 1; $i < $num; $i++)
    	$query .= "OR Etiqueta1 = ".$etiqueta[$i]." ";
    
	for ($i = 0; $i < $num; $i++)
    	$query .= "OR Etiqueta2 = ".$etiqueta[$i]." ";
	
	for ($i = 0; $i < $num; $i++)
    	$query .= "OR Etiqueta3 = ".$etiqueta[$i]." ";
    
	for ($i = 0; $i < $num; $i++)
    	$query .= "OR Etiqueta4 = ".$etiqueta[$i]." ";
    
	for ($i = 0; $i < $num; $i++)
    	$query .= "OR Etiqueta5 = ".$etiqueta[$i]." ";
    
	$ret = $mysqli->query($query) or die ($mysqli->error. " en la linea".(__LINE__-1));
	return $ret;
}
?>