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
        <script type="text/javascript" src="js/registrarCliente.js?5.0"></script>
        <title>Perfil Usuario</title>
    </head>

    <body>

        <header>
            <?php include_once("header.html"); ?>
        </header>

        <nav>
            <?php include_once("menu.php") ?>
        </nav>

<?php
        $consulta="SELECT * from clientes where id_cliente='".$_SESSION['id']."'";
        $resultado=mysqli_query($conexion,$consulta);
        $row = $resultado ->fetch_array();
                
                $nombre=$row['nombre_cliente'];
                $correo=$row['correo_electronico'];
                $telefono=$row['telefono'];
                $usuario=$row['nombre_usuario'];
                $contra=$row['password'];                
        ?> 
        <div class="div-form">
            <h2>Perfil del usuario</h2>

            <div class="div-comp">
                <form action="modelo/insertperfil.php" method="POST" onsubmit="return validaDatosCliente(correo, telefono, contra, 0);">
                    <div class="entradas">
                        <label><strong>Nombre completo: </strong></label>
                        <input class="campo" type="text" id="nombre" name="nombre" value="<?php echo $nombre?>" required>
                    </div>
                    <div class="entradas">
                        <label><strong>Correo electr&oacute;nico: </strong></label>
                        <input class="campo" type="text" id="correo" name="correo" value="<?php echo $correo ?>" required>
                    </div>
                    <div class="entradas">
                        <label><strong>*Tel&eacute;fono: </strong></label>
                        <input class="campo" type="text" id="tel" name="telefono" value="<?php echo $telefono?>" required>
                    </div>
                    <div class="entradas">
                        <label><strong>Usuario: </strong></label>
                        <input class="campo" type="text" id="usuario" name="usuario" value="<?php echo $usuario?>" required>
                    </div>
                    <div class="entradas">
                        <label><strong>Contrase&ntilde;a: </strong></label>
                        <input class="campo" type="password" id="contra" name="contra" value="<?php echo $contra?>" required>
                    </div>
            <div class="msg">
                <label><strong>* Campos opcionales.</strong></label>
            </div>
            <div class="formato1">
                <input class="button" type="submit" name="datosusuario" value="Actualizar">
            </div>
            </form>
        </div>
        </div>
        
        <script type="text/javascript">
            function validate(){
                var phone=document.getElementById('tel').value;
                if(!/^[0-9]+$/.test(phone)){
                    alert("Solo se pueden ingresar numeros");
                    return false; 
                }
                if(phone.length>10){
                    alert("El numero de telefono debe ser de 10 caracteres");
                    return false; 
                }
                if(phone.length<10){
                    alert("El numero de telefono debe ser de 10 caracteres");
                    return false;
                }
            return true;
            }
        </script>

        <footer>
            <?php include_once("footer.html") ?>
        </footer>        
    </body>
</html>