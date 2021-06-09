function validaDatosEmp(telefono, rfc, correo, func){
    
    var telefono_patron = "[1-9]{1}[0-9]{9}";
    
    var rfc_patron = "^(([A-ZÑ&]{4})([0-9]{2})([0][13578]|[1][02])(([0][1-9]|[12][\\d])|[3][01])([A-Z0-9]{3}))|" +
                       "(([A-ZÑ&]{4})([0-9]{2})([0][13456789]|[1][012])(([0][1-9]|[12][\\d])|[3][0])([A-Z0-9]{3}))|" +
                       "(([A-ZÑ&]{4})([02468][048]|[13579][26])[0][2]([0][1-9]|[12][\\d])([A-Z0-9]{3}))|" +
                       "(([A-ZÑ&]{4})([0-9]{2})[0][2]([0][1-9]|[1][0-9]|[2][0-8])([A-Z0-9]{3}))$";

    var correo_patron = "^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$"
    
    var msg ="";
    var confirm = false;

    if(!telefono.value.match(telefono_patron))
        msg += "Formato incorrecto en teléfono";

    if(!rfc.value.match(rfc_patron))
        msg += "\nRFC no válido";

    if(!correo.value.match(correo_patron))
        msg += "\nCorreo en formato inválido";
    
    if(msg == ""){
        
        if(func == 0)
            alert("Empleado agregado correctamente");
        else
            alert("Empleado actualizado correctamente");

        confirm = true;
    }
	else
		alert(msg);
	
	return confirm;
}

function validaDatosComp(existencias, precio, func){

    var existencias_patron =  "[1-9]|"+"[1-9]{1}[0-9]{1}|"+"[1-9]{1}[0-9]{2}";

    /*"[1-9]|[1-9]{1}[0-9]{1}|[1-9]{1}[0-9]{2}";*/

    var precio_patron = "[1-9]{1}[0-9]{2,5}\\.[0-9]{1,2}";

    var msg ="";
    var confirm = false;

    if(!existencias.value.match(existencias_patron))
        msg += "Existencias no válidas";

    if(!precio.value.match(precio_patron))
        msg += "\nPrecio no válido";

    if(msg == ""){

        if(func == 0)
            alert("Componente agregado correctamente");
        else
            alert("Componente actualizado correctamente");

        confirm = true;
    }
    else   
        alert(msg);

    return confirm;
}

function validaDatosProv(rfc, telefono, func){

    var rfc_moral_patron = "^(([A-ZÑ&]{3})([0-9]{2})([0][13578]|[1][02])(([0][1-9]|[12][\\d])|[3][01])([A-Z0-9]{3}))|" +
                            "(([A-ZÑ&]{3})([0-9]{2})([0][13456789]|[1][012])(([0][1-9]|[12][\\d])|[3][0])([A-Z0-9]{3}))|" +
                            "(([A-ZÑ&]{3})([02468][048]|[13579][26])[0][2]([0][1-9]|[12][\\d])([A-Z0-9]{3}))|" +
                            "(([A-ZÑ&]{3})([0-9]{2})[0][2]([0][1-9]|[1][0-9]|[2][0-8])([A-Z0-9]{3}))$";

    var telefono_patron = "[1-9]{1}[0-9]{9}";
    
    var msg ="";
    var confirm = false;

    if(!rfc.value.match(rfc_moral_patron))
        msg += "RFC no válido";

    if(!telefono.value.match(telefono_patron))
        msg += "\nFormato incorrecto en teléfono";

    if(msg == ""){

        if(func == 0)
            alert("Proveedor agregado correctamente");
        else   
            alert("Proveedor actualizado correctamente");
        
        confirm = true;
    }
    else   
        alert(msg);

    return confirm;
}
