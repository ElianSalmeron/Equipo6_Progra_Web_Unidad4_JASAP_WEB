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
        <link href="CSS/pagos.css?5.0" type="text/css" rel="stylesheet">
        <title>Pagos</title>
    </head>

    <body>

        <header>
            <?php include_once("header.html"); ?>
        </header>

        <nav>
            <?php include_once("menu.php") ?>
        </nav>

        <div class="form-ped-div">
            <div class="mov">
                <h2><span>M&eacute;todo de pago predeterminado</span></h2>

                <div class="formato">
                    <div class="etiqueta">
                        <form action="modelo/crudPago.php" method="post" id="act-pago">
                           <div>
                                <?php
                                    $consulta="SELECT * FROM tarjetas WHERE id_cliente='".$_SESSION['id']."'";
                                    $resultado=mysqli_query($conexion,$consulta);
                                    $consulta2="SELECT * FROM clientes WHERE id_cliente='".$_SESSION['id']."'";
                                    $resultado2=mysqli_query($conexion, $consulta2);
                                    $pred=$resultado2->fetch_array()['tarjeta_predet']; 
                                    if($resultado){
                                        while($row = $resultado ->fetch_array()){
                                            $tarjeta=$row['tipo'];
                                            $ntarjeta=$row['id_tarjeta'];
                                            if($pred == $ntarjeta){      
                                ?>
                                            <div>
                                                <input type="radio" name="tarjetan" for="tarj" value="<?php echo $ntarjeta; ?>" checked>
                                                <label for="tarj"><?php echo $tarjeta; ?>:</label>&nbsp;
                                                <label for="tarj"><?php echo "**** ".substr($ntarjeta, -4, 4); ?></label>
                                            </div>
                                <?php
                                    }else{
                                    ?>
                                        <div>
                                            <input type="radio" name="tarjetan" for="tarj" value="<?php echo $ntarjeta ?>">
                                            <label for="tarj"><?php echo $tarjeta; ?>: </label>&nbsp;
                                            <label for="tarj"><?php echo "**** ".substr($ntarjeta, -4, 4); ?></label>
                                        </div>
                                    <?php
                                            }
                                        }
                                    }
                                    ?>       
                            </div>
                        </form>
                    </div>
                        <div class="formato1">
                            <input class="button" type="submit" name="cambiar" value="Cambiar" form="act-pago">
                        </div>
                </div>
            </div>
        </div>
<!--asssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss-->
        <div class="form-pag-div">
            <div class="mov">
                <h2><span>Agregar m&eacute;todo de pago</span></h2>
                <div class="agr-pago">
                    <div class="etiqueta2">
                        <div>
                            <?php
                                $consulta="SELECT * from tarjetas where id_cliente='".$_SESSION['id']."'";
                                $resultado=mysqli_query($conexion,$consulta);
                                if($resultado){
                                    while($row = $resultado ->fetch_array()){
                                        $tarjeta=$row['tipo'];
                                        $ntarjeta=$row['id_tarjeta'];
                            ?>
                                        <div><tr><td><?php echo $tarjeta.': '; ?>&nbsp;<?php echo "**** ".substr($ntarjeta, -4, 4); ?></td></tr></div>
                            <?php
                                    }
                                }
                            ?> 
                        </div>
                    </div>                
                    <div class="agregardatos">
                        <form action="modelo/crudPago.php" method="post" onsubmit="return validate()">
                            <div>
                                <label for="metodop"> Seleccionar m&eacute;todo: </label>
                                <select class="campo1" name="metodop">
                                    <option value="Tarjeta de debito">Tarjeta de d&eacute;bito</option>
                                    <option value="Tarjeta de credito">Tarjeta de cr&eacute;dito</option>
                                    </select>
                            </div>
                            <div>                                    
                                <label for="numero"> N&uacute;mero de tarjeta: </label>
                                <input id="nt" class="campo" type="text" name="numerot"  required >
                                <span id="numerotarjeta"></span>
                            </div>
                            <div>                                    
                                <label for="titular"> Titular de la tarjeta: </label>
                                <input class="campo" type="text" name="titular" required>
                            </div>
                        
                    </div>
                            <div class="formato1">
                                <input class="button" type="submit" name="agregartarjeta" value="Agregar">
                            </div>
                        </form>
                </div>
            </div>
        </div>
<script type="text/javascript">
function validate(){
	var tarjet=document.getElementById('nt').value;
     
    if(!/^[0-9]+$/.test(tarjet)){
        alert("Solo se pueden ingresar numeros");
	return false; 
    }
    if(tarjet.length>16){
        alert("El numero de tarjeta debe ser de 16 caracteres");
      //document.getElementById('numerotarjeta').innerHTML="El numero de tarjeta debe ser 16 caracteres";
	return false; 
    }
    if(tarjet.length<16){
         alert("El numero de tarjeta debe ser de 16 caracteres");
        //document.getElementById('numerotarjeta').innerHTML="El numero de tarjeta debe ser 16 caracteres";
	return false;
    }
    
return true;
}
</script>
            
                
<!-- kkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk-->
        <div class="form-pag-div">
            <div class="mov">
                <h2><span>Eliminar m&eacute;todo de pago</span></h2>

                <div class="formato">
                    <div class="etiqueta">
                        <form action="modelo/crudPago.php" method="post">
                            <div>
                               <?php
            $consulta="SELECT * from tarjetas where id_cliente='".$_SESSION['id']."'";
            $resultado=mysqli_query($conexion,$consulta);
        if($resultado){
            while($row = $resultado ->fetch_array()){
                $tarjeta=$row['tipo'];
                $ntarjeta=$row['id_tarjeta'];
        ?>
    <div>
        <input type="radio" name="tarjetan" for="tarj" value="<?php echo $ntarjeta ?>">
        <label for="tarj"><?php echo $tarjeta?>: </label>&nbsp;
        <label for="tarj"><?php echo "**** ".substr($ntarjeta, -4, 4); ?></label>
    </div>
    <?php     
    }
  }
?>       </div>                
                    
                    </div>
        
                    <div class="formato1">
                        <input type="submit" class="button"  name="eliminarpago" value="Eliminar">
                        </div>
                           
                        </form>
                </div>
            </div>
        </div>

        <footer>
            <?php include_once("footer.html") ?>
        </footer>
    </body>
</html>