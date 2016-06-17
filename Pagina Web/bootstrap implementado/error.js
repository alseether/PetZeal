	var errores = ["","Datos invalidos o insuficientes", "Nombre de usuario invalido", "Contrasena incorrecta", "Datos invalidos o insuficientes", "El nick no esta disponible", "Datos de Usuario Invalidos", "Datos de Mascota Invalidos",
							"No se pudieron actualizar los datos de tu mascota", "No se pudieron actualizar tus datos", "No se pudieron actualizar tus datos",
							"Datos invalidos o insuficientes", "Destinatario incorrecto","No existe el usuario de destino", "El usuario destino no tiene mascotas", "El usuario destino no tiene ninguna mascota con ese nombre", "Inicia sesion para continuar" ];
	
	function muestraError(){
		var error = getURLParameter("err");
		if(error != 0 && error != null)	window.alert(errores[error]);
	}
	