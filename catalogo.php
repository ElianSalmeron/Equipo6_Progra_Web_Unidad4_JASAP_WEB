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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous"/>
        <link href="CSS/estilos.css?5.0" type="text/css" rel="stylesheet">
        <link href="CSS/fontello.css?5.0" rel="stylesheet">
        <link href="CSS/catComp.css?30.0" type="text/css" rel="stylesheet">
        <link href="CSS/sugerencias.css?5.0" type="text/css" rel="stylesheet">
        <title>Catalogo Componentes</title>

        <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
        <script>
            $(document).ready(function() {
                $('#comp').on('keyup', function() {
                    var key = $(this).val();		
                    var dataString = 'key='+key;
                    $.ajax({
                        type: "POST",
                        url: "ajax.php",
                        data: dataString,
                        success: function(data) {
                            //Escribimos las sugerencias que nos manda la consulta
                            $('#suggestions').fadeIn(1000).html(data);
                            //Al hacer click en alguna de las sugerencias
                            $('.suggest-element').on('click', function(){
                                    //Obtenemos la id unica de la sugerencia pulsada
                                    var id = $(this).attr('id');
                                    //Editamos el valor del input con data de la sugerencia pulsada
                                    $('#comp').val($('#'+id).attr('data'));
                                    //Hacemos desaparecer el resto de sugerencias
                                    $('#suggestions').fadeOut(250);
                                    return false;
                            });
                        }
                    });
                });
            }); 
        </script>
    </head>

    <body>

        <header>
            <?php include_once("header.html"); ?>
        </header>

        <nav>
            <?php include_once("menu.php") ?>
        </nav>

        <div class="page">
            <div class="div-form">
                <h2>Cat&aacute;logo de Componentes</h2>
                <div class="buscarcom">
                    <form method="post" action="buscCatalogo.php">
                        <label>Buscar componente: </label>
                        <input class="campos" id="comp" type="text" name="nombre-comp" placeholder=" Buscar"> 
                        <input type="submit" id="boton" name="buscar-comp" value="Buscar">
                    </form>
                    <div id="suggestions"></div>
                </div>
    
                <div class="div-comp">
<?php 
        $sql = "SELECT * FROM componentes";
        $result = mysqli_query($conexion, $sql);
        $numRegistros = $result->num_rows;
                    
            if($numRegistros >0){

                while($componente = $result->fetch_array()){
?>
                    <section class="componente">
                        <h1><span><?php echo $componente['nombre']; ?></span></h1>
                        <div class="componente1">
                            <div class="izquierda">
                                <dl>
                                    <dt><span>Descripcion: </span><?php echo $componente['descripcion']; ?> </dt>
                                    <dt><span>Categoria: </span><?php echo $componente['categoria']; ?> </dt>
                                    <dt><span>Existencias: </span><?php echo $componente['existencias']; ?> </dt>
                                    <dt><span>Precio: $</span><?php echo $componente['precio']; ?> </dt>
                                </dl>
                                <form method="POST" action="addComp.php">
                                    <input style="display: none;" type="text" value="<?php echo $componente['id_componente'] ?>" name="id_componente">
                                    <select name="cantidad">
                                            <?php 
                                                for($i=1; $i<= $componente['existencias']; $i++)
                                                    echo "<option>".$i."</option>";
                                            ?> 
                                    </select>
                                    <input class="button2" type="submit" name="Agregar" value="Agregar al carrito">
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
?>
                </div>
            </div>

            <aside>
<?php
                if(isset($_SESSION['id'])){
                    $sql = "SELECT * FROM detalles_carrito WHERE id_cliente = '".$_SESSION['id']."'";
                    $result = mysqli_query($conexion, $sql);
                    $numRegistros = $result->num_rows;

                    if($numRegistros > 0){

                        while($detalle_carrito = $result->fetch_array()){

                            $sql2 = "SELECT * FROM componentes WHERE id_componente = '".$detalle_carrito['id_componente']."'";
                            $result2 = mysqli_query($conexion, $sql2);
                            $componente = $result2->fetch_array();
?>  
                            <div class="info-comp">
                                <h3><?php echo $componente['nombre']; ?></h3>
                                <img src="Img/<?php echo $componente['image']; ?>">
                                <h3>Cantidad: <?php echo $detalle_carrito['cantidad']; ?> </h3>
                            </div>
<?php
                        }
                    }
                    else
                        echo "<h3>¡Tu carrito de JASAP está vacío!</h3>";
                }
                else
                    echo "<h3>Carrito vacío ¡Necesitas iniciar sesión para agregar productos al carrito!</h3>";
?>
            </aside>
        </div>

        <footer>
            <?php include_once("footer.html") ?>
        </footer>

    </body>
</html>