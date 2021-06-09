<?php
    session_start();
    include_once("modelo/conexion.php");
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="keywords" content="JASAP WEB">
        <meta name="author" content="Elian Salmerón, Eliel Pérez, Israel Serrano">
        <link href="CSS/estilos.css?5.0" type="text/css" rel="stylesheet">
        <link href="CSS/fontello.css?5.0" rel="stylesheet">
        <link href="CSS/perfil.css?5.0" type="text/css" rel="stylesheet">
        <title>Perfil Usuario</title>
    </head>

    <body>

        <header>
            <?php include_once("header.html"); ?>
        </header>

        <nav>
            <?php include_once("menu.php") ?>
        </nav>

        <div class="div-form">
            <h2>Perfil del usuario</h2>

            <div class="div-comp">
<?php
        $consulta="SELECT * from clientes where id_cliente='".$_SESSION['id']."'";
        $resultado=mysqli_query($conexion,$consulta);
        $row = $resultado ->fetch_array();
                
                $nombre = $row['nombre_cliente'];
                $correo = $row['correo_electronico'];

                if($row['telefono'] != null)
                    $telefono = $row['telefono'];
                else
                    $telefono = "";

                $usuario = $row['nombre_usuario'];
                $contra = $row['password'];  
                $passsword = '';
                
                for($i=0; $i<strlen($contra); $i++)
                    $passsword .= '*';
?> 
                <form action="">
                    <div class="etiquetas">
                        <label><strong>Nombre completo: </strong><?php echo $nombre; ?></label>
                    </div>
                    <div class="etiquetas">
                        <label><strong>Correo electr&oacute;nico: </strong><?php echo $correo; ?></label>
                    </div>
                    <div class="etiquetas">
                        <label><strong>*Tel&eacute;fono: </strong><?php echo $telefono; ?></label>
                    </div>
                    <div class="etiquetas">
                        <label><strong>Usuario: </strong><?php echo $usuario; ?></label>
                    </div>
                    <div class="etiquetas">
                        <label><strong>Contrase&ntilde;a: </strong><?php echo $passsword; ?></label>
                    </div>
                </form>
            </div>

            <div class="msg">
                <label><strong>* Campos opcionales.</strong></label>
            </div>
            <div class="formato1">
                <input onclick="location.href='actPerfil.php'" class="button" type="submit" name="datosusuario" value="Actualizar">
            </div>
        </div>

        <footer>
            <?php include_once("footer.html") ?>
        </footer>
    </body>
</html>