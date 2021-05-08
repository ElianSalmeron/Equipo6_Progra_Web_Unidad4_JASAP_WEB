function validaDatosCliente(correo, telefono){

    var correo_patron = "^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$"
    var telefono_patron = "[1-9]{1}[0-9]{9}";
    
    var msg ="";
    var confirm = false;

    if(correo.value != ""){
        if(!correo.value.match(correo_patron))
            msg += "Correo en formato inválido";
    }

    if(telefono.value != ""){
        if(!telefono.value.match(telefono_patron))
            msg += "\nFormato incorrecto en teléfono";
    }

    if(msg == ""){
        alert("Te has registrado correctamente");
        confirm = true;
    }
	else
		alert(msg);
	
	return confirm;
}