
	$(document).ready(function(){
	    $("#header").load("cabecera.php");
	    $("#slideIzq").load("postsGenerales.php");
	   $("#content").load("central.php?id=0&p=1");
	   $("#slideDer").load("infoEstatica.html");


	});

	function cambioMascota(id, posts){
		
		 $("#content").load("central.php?id=" + id + "&p=" + posts);
		$("#slideIzq").load("postsGenerales.php");
	}


function borrarPost(idPosts){
		
		  $.post("borrarPosts.php", {idPosts: idPosts}, function(result, state){
		  		if(result == 1){
		  			 $("#content").load("central.php?id=0&p=1");
		  			 $("#slideIzq").load("postsGenerales.php");
		  		}
		  });
}
function borrarPublicacion(idUsuario, idPublicacion){
		
		  $.post("borrarPublicaciones.php", {idPublicacion:idPublicacion}, function(result, state){
		  		if(result == 1){
		  			$("#content").load("central.php?id=" + idUsuario + "&p=0");
		  		}
		  });
}

function cargaPostCentro(id, idPosts){
		

	$("#content").load("lecturaPost.php?id=" + id + "&np=" + idPosts);

}


	