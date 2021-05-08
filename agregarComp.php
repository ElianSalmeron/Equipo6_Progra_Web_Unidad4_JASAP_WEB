<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="keywords" content="JASAP WEB">
        <meta name="author" content="Elian Salmerón, Eliel Pérez, Israel Serrano">
        <link href="CSS/estilos.css?5.0" type="text/css" rel="stylesheet">
        <link href="CSS/fontello.css" rel="stylesheet">
        <link href="CSS/Agregar.css?5.0" type="text/css" rel="stylesheet">
        <script type="text/javascript" src="js/crudAdmin.js?5.0"></script>
        <title>Agregar Componente</title>
    </head>

    <body>

        <header>
            <?php include_once("header.html"); ?>
        </header>

        <nav>
            <?php include_once("menuAdmin.php") ?>
        </nav>

        <div class="form-div">
            <h2><span>Agregar Componentes</span></h2>
            <div class="comp-crud">
                <div class="fun" id="selected">
                    <a href="agregarComp.php"><img class="icono" src="Img/Iconos/agregar.png"></a>
                    <p>Agregar</p>
                </div>
                <div class="fun">
                    <a href="consultarComp.php"><img class="icono" src="Img/Iconos/consultar.png"></a>
                    <p>Consultar</p>
                </div>
                <div class="fun">
                    <a href="actualizarComp.php"><img class="icono" src="Img/Iconos/actualizar.png"></a>
                    <p>Actualizar</p>
                </div>
                <div class="fun">
                    <a href="eliminarComp.php"><img class="icono" src="Img/Iconos/eliminar.png"></a>
                    <p>Eliminar</p>
                </div>
            </div>
            <div class="register-comp">
                <form id="form-component-register" method="post" action="modelo/InsertarComp.php">
                    <div>
                        <label id="label1" for="nombre">Nombre: </label>
                        <input class="campos" type="text" name="nombre" size="30" value="">
                    </div>
                    <div>
                        <label id="label2" for="categoria">Categoría: </label>
                        <select class="cat" name="categoria">
                            <option>Microprocesador</option>
                            <option>Memoria RAM</option>
                            <option>Torre</option>
                            <option>Monitor</option>
                            <option>Cooler</option>
                            <option>Motherboard</option>
                            <option>Almacenamiento</option>
                        </select>
                    </div>
                    <div>
                        <label for="existencias">Existencias: </label>
                        <input class="campos" type="text" name="existencias" size="8" value="" maxlength = "3">
                    </div>
                    <div>
                        <label id="label3" for="precio">Precio: </label>
                        <input class="campos" type="text" name="precio" size="8" value="" maxlength = "9">
                    </div>
                    <div>
                        <label for="descripcion">Descripción: </label>
                        <input class="description" type="text" name="descripcion">
                    </div>
                </form>
            </div> 
            <div id="botones">
                <input class="button" type="submit" name="" value="Guardar" form="form-component-register"
                onclick = "return validaDatosComp(existencias, precio, 0);">
                <input class="button" type="button" name="" value="Cancelar" onclick="location.href='gestionComp.php'">
            </div>
        </div>

        <footer>
            <?php include_once("footer.html") ?>
        </footer>
    </body>
</html>