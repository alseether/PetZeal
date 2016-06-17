 <?php
 	include_once('scriptsBBDD.php');
 	startDB();
 	$id = $_REQUEST["idPosts"];
	eliminaPost($id);
	closeDB();
	echo '1';
?>