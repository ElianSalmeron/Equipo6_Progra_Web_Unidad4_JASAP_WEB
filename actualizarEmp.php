<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="keywords" content="JASAP WEB">
        <meta name="author" content="Elian Salmerón, Eliel Pérez, Israel Serrano">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous"/>
        <link href="CSS/estilos.css?5.0" type="text/css" rel="stylesheet">
        <link href="CSS/fontello.css" rel="stylesheet">
        <link href="CSS/AgregarEmp.css?5.0" type="text/css" rel="stylesheet">
        <script type="text/javascript" src="js/crudAdmin.js"></script>
        <title>Actualizar Empleado</title>
    </head>

    <body>

        <header>
            <?php include_once("header.html"); ?>
        </header>

        <nav>
            <?php include_once("menuAdmin.php") ?>
        </nav>

        <div class="form-act-div">
            <h2><span>Actualizar Empleados</span></h2>
            <div class="comp-crud">
                <div class="fun">
                    <a href="agregarEmp.php"><img class="icono" src="Img/Iconos/agregar.png"></a>
                    <p>Agregar</p>
                </div>
                <div class="fun">
                    <a href="consultarEmp.php"><img class="icono" src="Img/Iconos/consultar.png"></a>
                    <p>Consultar</p>
                </div>
                <div class="fun" id="selected">
                    <a href="actualizarEmp.php"><img class="icono" src="Img/Iconos/actualizar.png"></a>
                    <p>Actualizar</p>
                </div>
                <div class="fun">
                    <a href="eliminarEmp.php"><img class="icono" src="Img/Iconos/eliminar.png"></a>
                    <p>Eliminar</p>
                </div>
            </div>
    
            <div class="busqueda">
                <form>
                    <label for="id">Buscar empleado: </label>
                    <input class="campob" type="text" name="id" size="10"  placeholder=" Buscar" required>
                    <input class="button" type="submit" name="Buscar" value="Buscar">
                </form>
            </div>
            
            <?php include_once("modelo/actEmp.php");
            ?>
           
        </div>

        <footer>
            <?php include_once("footer.html") ?>
        </footer>
    </body>
</html>