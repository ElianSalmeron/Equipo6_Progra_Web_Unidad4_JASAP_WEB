function validaDatosCliente(correo, telefono, password, func){

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

    if(password.value.length < 8 || password.value.length > 12)
        msg += "\nLa contraseña debe tener entre 8 y 12 caracteres";

    if(msg == ""){

        if(func == 0)
            alert("Se han actualizado los datos correctamente");
        else
            alert("Te has registrado correctamente");
            
        confirm = true;
    }
	else
		alert(msg);
	
	return confirm;
}