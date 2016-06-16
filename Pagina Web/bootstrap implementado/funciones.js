	
	
	function openTabMasc(evt, masctabName) {
	    // Declare all variables
	    var i, mastabcontent, masctablinks;

	    // Get all elements with class="tabcontent" and hide them
	    mastabcontent = document.getElementsByClassName("mastabcontent");
	    for (i = 0; i < mastabcontent.length; i++) {
	        mastabcontent[i].style.display = "none";
	    }

	    // Get all elements with class="tablinks" and remove the class "active"
	    masctablinks = document.getElementsByClassName("masctablinks");
	    for (i = 0; i < mastabcontent.length; i++) {
	        masctablinks[i].className = masctablinks[i].className.replace("active", "");
	    }

	    // Show the current tab, and add an "active" class to the link that opened the tab
	    document.getElementById(masctabName).style.display = "block";
	    evt.currentTarget.className += " active";
	}

	function openTabMen(evt, mentabName) {
	    // Declare all variables
	    var j, mentabcontent, mentablinks;

	    // Get all elements with class="tabcontent" and hide them
	    mentabcontent = document.getElementsByClassName("mentabcontent");
	    for (j = 0; j < mentabcontent.length; j++) {
	        mentabcontent[j].style.display = "none";
	    }

	    // Get all elements with class="tablinks" and remove the class "active"
	    mentablinks = document.getElementsByClassName("mentablinks");
	    for (j = 0; j < mentabcontent.length; j++) {
	        mentablinks[j].className = mentablinks[j].className.replace("active", "");
	    }

	    // Show the current tab, and add an "active" class to the link that opened the tab
	    document.getElementById(mentabName).style.display = "block";
	    evt.currentTarget.className += " active";
	}
	
	function mostrarVentanaRedactar() {
		
		var j;
		var caja = document.getElementsByClassName("cajaCambiarFoto");
		
		 for (j = 0; j < caja.length; j++) {
			 if(caja[j].style.visibility == "visible"){
				 caja[j].style.visibility = "hidden";
			 }
			else{
				caja[j].style.visibility = "visible";
			}
	    }
	}
	
	function openContMenRecibido(evt, mascota, mensaje) {
		
		$("#content").load("mensajeria.php?corr="+mensaje);
		
	    // Declare all variables
	    var j, tabsMascota;

	    // Get all elements with class="tabcontent" and hide them
	    tabsMascota = document.getElementsByClassName("tabMascota");
	    for (j = 0; j < tabsMascota.length; j++) {
	        tabsMascota[j].className = tabsMascota[j].className.replace("active", "");
	    }

	    // Show the current tab, and add an "active" class to the link that opened the tab
	    document.getElementById("tabM"+mascota).className += " active";
	    var correo = document.getElementById("m"+mascota+"in"+mensaje);
		correo.className += " in";
	}

	function openContMenEnviado(evt, mensaje) {
	    // Declare all variables
	    var j, mentabcontent, mentablinks;

	    // Get all elements with class="tabcontent" and hide them
	    mentabcontent = document.getElementsByClassName("contenidoMensajeE");
	    for (j = 0; j < mentabcontent.length; j++) {
	        mentabcontent[j].style.display = "none";
	    }

	    // Get all elements with class="tablinks" and remove the class "active"
	    mentablinks = document.getElementsByClassName("cabeceraMensajeE");
	    for (j = 0; j < mentabcontent.length; j++) {
	        mentablinks[j].className = mentablinks[j].className.replace("active", "");
	    }

	    // Show the current tab, and add an "active" class to the link that opened the tab
	    document.getElementById(mensaje).style.display = "block";
	  	evt.currentTarget.className += " active";
	}
	
	function viewBox(){
		var caja = document.getElementsByClassName("cajaCambiarFoto");
		if(caja[0].style.visibility == "visible")
 			caja[0].style.visibility = "hidden";
 		else
 			caja[0].style.visibility = "visible";
	}

	function viewPost() {
		var caja = document.getElementsByClassName("cajaCambiarFoto");
 		if(caja[0].style.visibility == "visible"){
 			caja[0].style.visibility = "hidden";
 			post.style["visibility"] = "visible";
 			comment.style["visibility"] = "visible";
 		}else{
 			caja[0].style.visibility = "visible";
 			post.style["visibility"] = "hidden";
 			comment.style["visibility"] = "hidden";
 		}
	}

	function closeBox(){
		var caja = document.getElementsByClassName("cajaCambiarFoto");
 		caja[0].style.visibility = "hidden";
	}

	function getURLParameter(name) {
 		return decodeURIComponent((new RegExp('[?|&]' + name + '=' + '([^&;]+?)(&|#|;|$)').exec(location.search) || [null, ''])[1].replace(/\+/g, '%20')) || null;
	}