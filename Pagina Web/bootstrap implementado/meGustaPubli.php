<?php

    include_once('scriptsBBDD.php');
    include_once('funciones.php');

    startDB();

    $idPubli = $_REQUEST["idP"];
    $idMasc = $_REQUEST["idMasc"];

    $info = getInfoPublicacion($idPubli)->fetch_assoc();
    $likes = $info["Likes"];

    actualizaLikePubli($idPubli, $likes+1);

    header('Location: ./info.html?masc=true&id='.$idMasc);
    
    closeDB();

?>