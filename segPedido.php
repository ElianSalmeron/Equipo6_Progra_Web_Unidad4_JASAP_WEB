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
        <link href="CSS/segPedido.css?5.0" type="text/css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous"/>
        <title>Datos env&iacute;o</title>
    </head>

    <body>

        <header>
            <?php include_once("header.html"); ?>
        </header>

        <nav>
            <?php include_once("menu.php") ?>
        </nav>

        <div class="form-ped-div">
            <h2><span>Seguimiento de pedidos</span></h2>

<?php 
        $sql = "SELECT * FROM pedidos_online WHERE id_cliente = '".$_SESSION['id']."'";
        $result = mysqli_query($conexion, $sql);
        $numRegistros = $result->num_rows;

        if($numRegistros > 0){
?>
            <div class="busqueda">
                <form method="POST">
                    <label for="id">Cancelar pedido: </label>
                    <input class="campob" type="text" name="id_ped" size="10" placeholder=" Buscar">
                    <input class="button" type="submit" name="Cancelar-Ped" value="Cancelar">
                </form>
            </div>

<?php   include_once("modelo/cancelarPedOn.php"); ?>

            <div class="most-ped">
                <table>
                    <tr class="cabt">
                        <td><strong> Id_pedido</strong></td>
                        <td><strong> Fecha y hora</strong></td>
                        <td><strong> Productos</strong></td>
                        <td><strong> Monto total</strong></td>
                        <td><strong> Estado</strong></td>
                    </tr>

<?php 
            while($pedido_online = $result->fetch_array()){
                $sql2 = "SELECT * FROM detalles_po WHERE id_pedido_On = '".$pedido_online['id_pedido_On']."'";
                $result2 = mysqli_query($conexion, $sql2);

                $detalles_pedido = "";
                
                while($componente = $result2->fetch_array()){
                    $sql3 = "SELECT nombre FROM componentes WHERE id_componente  = '".$componente['id_componente']."'";
                    $result3 = mysqli_query($conexion, $sql3);

                    $detalles_pedido .= $result3->fetch_array()['nombre']."- Cantidad: ".$componente['cantidad']."<br>";
                }
?>
                    <tr>
                        <td><?php echo $pedido_online['id_pedido_On']; ?></td>
                        <td><?php echo $pedido_online['fecha']; ?></td>
                        <td><?php echo $detalles_pedido; ?></td>
                        <td>$<?php echo $pedido_online['monto_total']; ?></td>
                        <td><?php echo $pedido_online['estado']; ?></td>
                    </tr>
<?php 
            }
        }
        else
            echo "<div align='center'><h3>¡No se ha realizado ningún pedido!</h3></div>";
?>
                </table>
            </div>

        </div>

        <div class="form-ped-div">
            <div class="mov">
                <h2><span>Datos de env&iacute;o predeterminado</span></h2>
                <div class="formato">
                    <div class="etiqueta">
                        <form action="modelo/crudDireccion.php" method="post" id="change-direc">
                            <?php

                                $consulta="SELECT * from direcciones where id_cliente='".$_SESSION['id']."'";
                                $resultado=mysqli_query($conexion,$consulta);
                            
                                $consulta2="SELECT * from clientes where id_cliente='".$_SESSION['id']."'";
                                $resultado2=mysqli_query($conexion,$consulta2);
                                $pred = $resultado2->fetch_array()['direccion_predet'];
                                if($resultado){
                                    while($row = $resultado ->fetch_array()){
                                        $direccion=$row['direccion'];
                                        $id_direccion=$row['id_direccion'];
                                        if($pred==$id_direccion){
                                            ?>                            
                                            <div>
                                                <input type="radio" name="direccion" for="direc" value  ="<?php echo $direccion ?>" checked>
                                                <label for="direc"><?php echo $direccion ?></label>
                                            </div>                          
                                            <?php 
                                        }else{
                                            ?> 
                                            <div>
                                                <input type="radio" name="direccion" for="direc" value  ="<?php echo $direccion ?>">
                                                <label for="direc"><?php echo $direccion ?></label>
                                            </div>
                                            <?php
                                        }    
                                    }                 
                                }
                            ?>
                        </form>
                    </div> 
                    <div class="formato2">
                        <input type="submit" class="button" name="cambiar" value="Cambiar" form="change-direc">    
                    </div>
                </div>
            </div>
        </div>

        <div class="form-pag-div">
            <div class="mov">
                <h2><span>Agregar datos de env&iacute;o</span></h2>
                <div class="etiqueta">                   
                    <?php
                        $consulta="SELECT direccion from direcciones where id_cliente='".$_SESSION['id']."' ";
                        $resultado=mysqli_query($conexion,$consulta);
                        if($resultado){
                            while($row = $resultado ->fetch_array()){
                            $direccion=$row['direccion'];
                    ?>
                    <div><tr><td><?php echo $direccion ?></td></tr></div>
                    <?php     
                            }
                        }
                    ?>                  
                </div>
                <form id="form-envio" action="modelo/crudDireccion.php" method="post">
                    <div class="formato">
                        <div class="formato1">
                            <label for="direc"> Dirección: </label>
                            <input type="text" name="aDirec" class="campo" maxlength="70">
                        </div>

                        <div class="formato2">
                            <input type="submit" class="button" name="agregar" value="Agregar">    
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="form-pag-div">
            <div class="mov">
                <h2><span>Actualizar datos de env&iacute;o</span></h2>

                <div class="etiqueta">
                    <form action="modelo/crudDireccion.php" method="post">
                        <?php

$consulta="SELECT * from direcciones where id_cliente='".$_SESSION['id']."'";
$resultado=mysqli_query($conexion,$consulta);
                            
$consulta2="SELECT * from clientes where id_cliente='".$_SESSION['id']."'";
$resultado2=mysqli_query($conexion,$consulta2);
$pred = $resultado2->fetch_array()['direccion_predet'];
if($resultado){
while($row = $resultado ->fetch_array()){
$direccion=$row['direccion'];
$id_direccion=$row['id_direccion'];
if($pred==$id_direccion){
?>                            
<div>
<input type="radio" name="direccion" for="direc" value  ="<?php echo $direccion ?>" checked>
<label for="direc"><?php echo $direccion ?></label>
</div>                          
<?php 
}else{
?> 
<div>
<input type="radio" name="direccion" for="direc" value  ="<?php echo $direccion ?>">
<label for="direc"><?php echo $direccion ?></label>
</div>
<?php
}    
}                 
}
?> 
                   
                
                    <div class="formato">
                        <div class="formato1">
                            <label for="direc"> Dirección: </label>
                            <input type="text" name="actDirec" class="campo" maxlength="70">
                        </div>
                        <div class="formato2">
                            <input type="submit" class="button" name="actualizar" value="Actualizar">    
                        </div>
                    </div>
                </form>
            </div>
        </div>
        </div>

        <div class="form-pag-div">
            <div class="mov">
                <h2><span>Eliminar datos de env&iacute;o</span></h2>
                <form action="modelo/crudDireccion.php" method="post">
                    <div class="formato">
                        <div class="etiqueta">
                            <?php
                                $consulta="SELECT direccion from direcciones where id_cliente='".$_SESSION['id']."' ";
                                $resultado=mysqli_query($conexion,$consulta);
                                if($resultado){
                                    while($row = $resultado ->fetch_array()){
                                        $direccion=$row['direccion'];
                            ?>
                                <div>
                                    <input type="radio" name="direccion" for="direc" value="<?php echo $direccion ?>">
                                    <label for="direc"><?php echo $direccion ?></label>
                                </div>
                            <?php
                                    }
                                }
                            ?>
                        </div>

                        <div class="formato2">
                            <input type="submit" class="button" name="eliminar" value="Eliminar">    
                        </div>

                    </div>
                </form>
            </div>
        </div>

        <footer>
            <?php include_once("footer.html") ?>
        </footer>
    </body>
</html>