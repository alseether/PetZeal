<?php

    include_once('scriptsBBDD.php');
    include_once('funciones.php');

    startDB();

    $idPost = $_REQUEST["idP"];
    $likes = $_REQUEST["like"];
    $idUsu = $_REQUEST["idUsu"];

    
    actualizaLikePost($idPost, $likes+1);

    header('Location: ./index.html?dir=true&id='.$idUsu.'&np='.$idPost);
    
    closeDB();

?>