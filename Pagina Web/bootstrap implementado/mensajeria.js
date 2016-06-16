$(document).ready(function(){
    $("#header").load("cabecera.php");
    $("#content").load("mensajeria.php?corr=0");
	$( ".contenidoMensajeR" ).css("display", "none");
	$( ".contenidoMensajeE" ).css("display", "none");
});	


