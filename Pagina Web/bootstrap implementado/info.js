$(document).ready(function(){
	var masc = getURLParameter('masc');
	var id = getURLParameter('id')
	var parameters = "masc=" + masc + "&id=" + id;
    $("#header").load("cabecera.php");
    $("#content").load("info.php?" + parameters);
	
	muestraError();
});	