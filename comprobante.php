<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="keywords" content="JASAP WEB">
        <meta name="author" content="Elian Salmerón, Eliel Pérez, Israel Serrano">
        <link href="CSS/comprobante.css?5.0" type="text/css" rel="stylesheet">
        <title>Comprobante de venta</title>

        <style>

            *{
                margin: 0;
                padding: 0;
            }

            body{
                padding: 10px;
                font-family: Arial, Helvetica, sans-serif;
            }

            h1{
                font-size: 12px;
                text-align: center;
                color: white;
                background-color: rgb(244, 67, 54);
            }

            h2{
                text-align: center;
                font-size: 10px;
                margin-top: 10px;
                margin-bottom: 3px;
            }

            p{
                font-size: 9px;
                margin-bottom: 1px
            }

            hr{
                border: 0.75px;
            }

            span{
                font-weight: bolder;
            }

            .empresa{
                margin-top: 3px;
                text-align: center;
                margin-bottom: 3px;
            }     
            
            .info-venta{
                text-align: center;
                margin-top: 4px;
            }

            .componentes{
                margin-top: 5px;
                text-align: justify;
                margin-bottom: 5px;
            }

            .total{
                margin-top: 5px;
                text-align: right;
                margin-bottom: 12px;
            }

            .thanks{
                margin-top: 3px;
                text-align: center;
                margin-bottom: 3px;
            }

        </style>
    </head>

<?php
    $sql = "SELECT * FROM empresa";
    $result = mysqli_query($conexion, $sql);
    $empresa = $result->fetch_array();
?>

    <body>
        <h1>Comprobante de venta</h1>
        
        <div class="empresa">
            <p><span><?php echo $empresa['razon_social']; ?></span></p>
            <p><span>RFC:</span> <?php echo $empresa['rfc']; ?></p>
            <p><span>Telefono:</span> <?php echo $empresa['telefono']; ?></p>
            <p><span>Dirección:</span> <?php echo $empresa['direccion']; ?></p>
        </div>

        <hr>

        <div class="info-venta">
            <p><span>Fecha:</span> <?php echo $fecha; ?></p>
            <p><span>N° Venta:</span> <?php echo $id_venta; ?></p>
            <p><span>Empleado:</span> <?php echo $_SESSION['nombre']; ?></p>
        <div>

        <h2>Detalles de la venta</h2>
        <hr>

        <div class="componentes">

<?php       for($i=0; $i<count($_SESSION["venta"]); $i++){    ?>
                <?php echo '<p><span>'.$_SESSION["venta"][$i][0]."</span> -   $".$_SESSION["venta"][$i][2].' * '.$_SESSION["venta"][$i][1].' : $'.$_SESSION["venta"][$i][3].'</p>'; ?>
<?php       } 
?>
        </div>

        <hr>

        <div class="total">
            <p><span>Total: $</span> <?php echo $_SESSION['monto_total']; ?></p>
        </div>

        <hr>
        
        <div class="thanks">
            <p><span>¡Gracias por su compra!</p>
        </div> 

        <hr>

    </body>
</html>