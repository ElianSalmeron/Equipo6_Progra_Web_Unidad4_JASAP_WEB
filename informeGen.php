<?php session_start(); ?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="keywords" content="JASAP WEB">
        <meta name="author" content="Elian Salmerón, Eliel Pérez, Israel Serrano">
        <link href="CSS/estilos.css?5.0" type="text/css" rel="stylesheet">
        <link href="CSS/fontello.css?5.0" rel="stylesheet">
        <link href="CSS/infGeneral.css?5.0" type="text/css" rel="stylesheet">
        <script type="text/javascript" src="js/informeGen.js?5.0"></script>
        <title>Informe General</title>

        <script type="text/javascript"> 
            function verificaFechas(fi, ff){
                
                var msg = "";
                var confirm = false;

                if(fi != "" && ff != ""){
                    var fecha_inicial = new Date(fi);
                    var fecha_final = new Date(ff);
                    var fecha_actual = new Date();

                    if(fecha_final >= fecha_actual)
                        msg += "La fecha final es mayor a la fecha actual";
                    
                    if(fecha_inicial > fecha_final)
                        msg += "\nLa fecha inicial es mayor a la fecha final";

                    if(msg == ""){
                        alert("Generando informe...");
                        confirm = true;
                    }
                    else
                        alert(msg);
                }
                else
                    alert("Campos vacíos, por favor verifique");

                return confirm;
            }
        </script>
    </head>

    <body>

        <header>
            <?php include_once("header.html"); ?>
        </header>

        <nav>
            <?php include_once("menu.php") ?>
        </nav>

        <div class="form-con-div">
            <h2><span>Informe General</span></h2>
                
            <div class="form-date">
                <div class="izquierda">
                    <div>
                        <form method="POST">
                            <label for="fecha_inicio"> Fecha inicial: </label>
                            <input class="campos" id="iz" type="date" name="fecha_inicio" value="">
                            <label for="fecha_final"> Fecha final: </label>
                            <input class="campos" id="de" type="date" name="fecha_final" value="">
                            <input type="submit" id="genera" name="Generar" value="Generar"
                            onclick= "return verificaFechas(fecha_inicio.value, fecha_final.value);">
                        </form>
                    </div>
                </div>
                <div class="derecha">
                </div>
            </div>

            <?php include_once("generarInforme.php"); ?>
        </div>

        <footer>
            <?php include_once("footer.html") ?>
        </footer>
    </body>
</html>