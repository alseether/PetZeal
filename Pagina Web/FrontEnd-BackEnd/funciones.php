 <?php
 function setCookies($login,$rol,$idUsu){
        setcookie("login", $login, time() + (3600*24), "/petzeal/");
        setcookie("rol", $rol, time() + (3600*24), "/petzeal/");
        setcookie("idUsu", $idUsu, time() + (3600*24), "/petzeal/");
    }

?>