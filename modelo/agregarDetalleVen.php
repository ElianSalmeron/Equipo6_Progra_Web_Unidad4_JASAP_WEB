<?php 
        include_once("conexion.php");
        
        if(isset($_POST['agregar'])){
            $nombre_comp = $_POST['key'];  
                
            $sql = "SELECT * FROM componentes WHERE nombre = '".$nombre_comp."'";
            $result = mysqli_query($conexion,$sql);
            $numRegistros = $result->num_rows;

            if($numRegistros > 0){
        
                if($componente = mysqli_fetch_array($result)){ 

                    $detalle = array($componente['nombre'], $_POST['cantidad'], $componente['precio'], $_POST['cantidad'] * $componente['precio'], $componente['id_componente'], $componente['existencias']);
                    $indice = existeDetalle($detalle);

                    if($indice > -1)
                        actualizaDetalle($indice, $detalle);
                    else
                        $_SESSION["venta"][] = $detalle;

                    $_SESSION["monto_total"] += $_POST['cantidad'] * $componente['precio'];
                    
                    for($i=0; $i<count($_SESSION["venta"]); $i++){
                    ?>
                        <tr>
                            <td><?php echo $_SESSION["venta"][$i][0]; ?></td>
                            <td><?php echo $_SESSION["venta"][$i][1]; ?></td>
                            <td>$<?php echo $_SESSION["venta"][$i][2]; ?></td>
                            <td>$<?php echo $_SESSION["venta"][$i][3]; ?></td>
                        </tr>
                    <?php 
                    }
                }

            }
        }  

        function existeDetalle($detalle){
            $indice = -1;

            for($i=0; $i<count($_SESSION["venta"]); $i++){
                if($_SESSION["venta"][$i][0] == $detalle[0])
                    $indice = $i;
            }
            return $indice;
        }

        function actualizaDetalle($i, $detalle){
            $_SESSION["venta"][$i][1] += $detalle[1];
            $_SESSION["venta"][$i][3] += $detalle[3];
        }
?>