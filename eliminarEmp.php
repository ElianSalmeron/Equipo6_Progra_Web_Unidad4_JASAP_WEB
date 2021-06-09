<?php
    session_start();
    include_once("modelo/conexion.php");
?>

<!DOCTYPE html>
<html>
<head>
	<title>Eliminar Empleados</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta name="keywords" content="JASAP WEB">
    <meta name="author" content="Elian Salmerón, Eliel Pérez, Israel Serrano">
    <link rel="stylesheet" href="CSS/style.css?5.0">
    <link href="CSS/estilos.css?5.0" type="text/css" rel="stylesheet">
    <link href="CSS/modal.css?5.0" type="text/css" rel="stylesheet">
    <link href="CSS/fontello.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous"/>
</head>
<body>    

        <header>
            <?php include_once("header.html"); ?>
        </header>

        <nav>
            <?php include_once("menu.php") ?>
        </nav>

    <div class="consultarcomp">
        <h1><span>Eliminar Empleados</span></h1>
        
        <div class="iconos">        
            <section id="seleccionado">
                <a href="eliminarEmp.php"><img src="Img/Iconos/eliminar.png"></a>
                <h3>Eliminar</h3>
             </section> 
            <section>
                <a href="actualizarEmp.php"><img src="Img/Iconos/actualizar.png"></a>
                <h3>Actualizar</h3>
            </section> 
            <section>
                <a href="consultarEmp.php"><img src="Img/Iconos/consultar.png"></a>
                <h3>Consultar</h3>
            </section>
            <section>
                <a href="agregarEmp.php"><img src="Img/Iconos/agregar.png"></a> 
                <h3>Agregar</h3>
            </section>
             </div>
            <div class="buscarcom">
                <form>
                    <label>Buscar empleado: </label>
                    <input type="text" name="busc" placeholder=" Buscar" required> 
                    <input type="submit" id="boton" name="Buscar" value="Buscar">
                    <input type="submit" id="boton2" name="Eliminar" value="Eliminar" form="emp-elim">    
                </form>
            </div>
            <div class="mostrarcomp">
                <table>
                    <tr class="cabt">
                        <td><strong>Id_empleado</strong></td>
                        <td><strong>Nombre</strong></td>
                        <td><strong>Rol</strong></td>
                        <td><strong>Teléfono</strong></td>
                        <td><strong>RFC</strong></td>
                        <td><strong>Correo</strong></td>
                    </tr>
                    <?php include_once("modelo/deleteEmp.php"); ?> 
                </table>
            </div>    
    </div>
    <footer>
        <?php include_once("footer.html") ?>
    </footer>
</body>
</html>