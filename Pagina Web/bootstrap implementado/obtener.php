<?php
    // Conexion a la base de datos
    include_once("funciones.php");
    include_once("scriptsBBDD.php");
    startDB();
    $id = $_REQUEST['id']
    echo '<h1>'.$id.'</h1>';
    if ($id > 0)
    {
        // Consulta de búsqueda de la imagen.
        $consulta = "SELECT imagen, tipo_imagen FROM imagenes WHERE imagen_id=".$id."";
        $resultado = query($consulta);
        $datos = $resultado->fetch_assoc();
     
        $imagen = $datos['imagen']; // Datos binarios de la imagen.
        $tipo = $datos['tipo_imagen'];  // Mime Type de la imagen.
        // Mandamos las cabeceras al navegador indicando el tipo de datos que vamos a enviar.
        header("Content-type: ".$tipo);
        // A continuación enviamos el contenido binario de la imagen.
        echo $imagen;
    }
    closeDB();
?>