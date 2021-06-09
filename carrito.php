<?php 
    session_start(); 
    include_once("modelo/conexion.php");
    $monto_total = 0;
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
        <link href="CSS/catComp.css?25.0" type="text/css" rel="stylesheet">
        <title>Carrito compras</title>
    </head>

    <body>
        
        <header>
            <?php include_once("header.html"); ?>
        </header>

        <nav>
            <?php include_once("menu.php") ?>
        </nav>

        <div class="div-form2">
            <h2>Carrito de compras</h2>

            <div class="content">

                <div class="div-comp-car">

<?php 
        if(isset($_SESSION['id'])){

            $sql = "SELECT SUM(cantidad) AS cantidad FROM detalles_carrito WHERE id_cliente = '".$_SESSION['id']."'";
            $result = mysqli_query($conexion, $sql);
            $cantidad_componentes = $result->fetch_array()['cantidad'];
            
            $sql = "SELECT * FROM detalles_carrito WHERE id_cliente = '".$_SESSION['id']."'";
            $result = mysqli_query($conexion, $sql);
            $numRegistros = $result->num_rows;

            if($numRegistros > 0){

                $monto_total = 0;

                while($detalle_carrito = $result->fetch_array()){
                    $sql = "SELECT * FROM componentes WHERE id_componente = '".$detalle_carrito['id_componente']."'";
                    $result2 = mysqli_query($conexion, $sql);
                    $componente = $result2->fetch_array();
                    $total_componente = $componente['precio'] * $detalle_carrito['cantidad'];
                    $monto_total += $total_componente; 
?>
                    <section class="componente">
                        <h1><span><?php echo $componente['nombre']; ?></span></h1>
                        <div class="componente1">
                            <div class="izquierda">
                                <dl>
                                    <dt><span>Descripcion: </span><?php echo $componente['descripcion']; ?></dt>
                                    <dt><span>Categoria: </span><?php echo $componente['categoria']; ?></dt>
                                    <dt><span>Cantidad: </span><?php echo $detalle_carrito['cantidad']; ?></dt>
                                    <dt><span>Precio total: $</span><?php echo $total_componente; ?> </dt>
                                </dl>
                                <form method="POST" action="modelo/delCompCarrito.php" id="modify-car">
                                    <input style="display: none;" type="text" value="<?php echo $componente['id_componente'] ?>" name="id_componente">
                                    <input class="button" type="submit" name="eliminar" value="Eliminar">
                                </form> 
                            </div>
                            <div class="derecha">
                                <img src="Img/<?php echo $componente['image']; ?>">
                            </div>
                        </div>
                    </section>
<?php
                }
            }
            else
                echo "<h3>¡Tu carrito de JASAP está vacío!</h3>";
        }
        else
            echo "<h3>¡Necesitas iniciar sesión para agregar productos al carrito!</h3>";
        
?>
                </div>

                <div class="div-action">
    
                    <div class="comp-crud">
                        <div class="fun">
                        </div>
                        <div class="fun">
                            <a href="modelo/vaciarCarrito.php"><img class="icono" src="Img/Iconos/eliminar.png"></a>
                            <p>Vaciar Carrito</p>
                        </div>
                    </div>

                    <div class="etiquetas2">
                        <div class="cantcomp">
                            <label for="cantComp"> Cant. componentes: </label>
                            <input class="campo" type="text" name="cantComp" value="<?php if(isset($cantidad_componentes)) echo $cantidad_componentes; ?>" disabled>
                        </div>
                        
                        <div class="tot">
                            <label for="total"> Total: </label>
                            <input class="campo" type="text" name="total" value="$<?php if(isset($monto_total)) echo $monto_total; ?>" disabled>
                            <input type="text" style="display: none;" name="monto_total" value="<?php if(isset($monto_total)) echo $monto_total; ?>" form="compra-comp">
                        </div>
                    </div>

                    <div class="pagos">
                        <h1><span>M&eacute;todo de pago</span></h1>
<?php 
        if(isset($_SESSION['id'])){
            $sql3 = "SELECT tarjeta_predet FROM clientes WHERE id_cliente = '".$_SESSION['id']."'";
            $result3 = mysqli_query($conexion, $sql3);
            $tarjeta = $result3->fetch_array()['tarjeta_predet'];

            if($tarjeta != null){

                $tarjeta_oculta = '**** '.substr($tarjeta, -4, 4);

                $sql4 = "SELECT tipo FROM tarjetas WHERE id_cliente = '".$_SESSION['id']."'";
                $result4 = mysqli_query($conexion, $sql4);
                $tipo_tarjeta = $result4->fetch_array()['tipo'];
?>
                        <input type="radio" name="tarjeta" value="<?php echo $tipo_tarjeta.": ".$tarjeta; ?>" form="compra-comp" checked>
                        <label for="tarjeta"><?php echo $tipo_tarjeta.": ".$tarjeta_oculta; ?></label>
<?php 
            }
            else{
?>
                <label>¡No hay tarjetas registradas!</label>
<?php 
            } 
        }
?>
                    </div>
                    
                    <div class="pagos">
                        <h1><span>Direcci&oacute;n de env&iacute;o</span></h1>
<?php
        if(isset($_SESSION['id'])){
            $sql5 = "SELECT direccion_predet FROM clientes WHERE id_cliente = '".$_SESSION['id']."'";
            $result5 = mysqli_query($conexion, $sql5);
            $id_direccion = $result5->fetch_array()['direccion_predet'];

            if($id_direccion != null){

                $sql6 = "SELECT direccion FROM direcciones WHERE id_direccion = '".$id_direccion."'";
                $result6 = mysqli_query($conexion, $sql6);
                $direccion = $result6->fetch_array()['direccion'];
?>
                <input type="radio" name="direccion" value="<?php echo $direccion; ?>" form="compra-comp" checked>
                <label for="direccion"><?php echo $direccion; ?></label>
<?php
            }
            else
                {
?>
                <label>¡No hay direcciones registradas!</label>
<?php
            }
        }
?>
                    </div>

                    <div class="botones">
<?php
        if(isset($tarjeta, $direccion) && $tarjeta != null && $direccion != null && $monto_total > 0){
?>
                        <form method="POST" action="modelo/realizarPedidoOn.php" id="compra-comp">
                            <input type="submit" id="boton" name="comprar" value="Comprar">
                        </form>
<?php
        }
?>
                    </div>
                </div>

            </div>
        </div>

        <footer>
            <?php include_once("footer.html") ?>
        </footer>
    </body>
</html>