$(document).ready(function(){
	var a = getURLParameter('animal');
	var parameters = "animal=" + a;
    $("#header").load("cabecera.php");
    $("#content").load("informacion.php?" + parameters);
	$("#slideDer").load("infoEstatica.html");
	
	muestraError();
});	