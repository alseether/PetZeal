 <?php
 	include_once('scriptsBBDD.php');
 	startDB();
 	$id = $_REQUEST["idPublicacion"];
	eliminaPublicacion($id);
	closeDB();
	echo '1';
?>