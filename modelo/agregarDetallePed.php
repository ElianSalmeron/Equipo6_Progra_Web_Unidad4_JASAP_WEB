<?php 
        include_once("conexion.php");
        
        if(isset($_POST['agregar'])){
            $nombre_comp = $_POST['name-componente'];

            if($_SESSION["proveedor"] == "")
                $_SESSION["proveedor"] = $_POST["proveedor"];

            if($_SESSION["proveedor"] == $_POST["proveedor"]){ 
              
                $sql = "SELECT * FROM componentes WHERE nombre = '".$nombre_comp."'";
                $result = mysqli_query($conexion,$sql);
                $numRegistros = $result->num_rows;

                if($numRegistros > 0){
            
                    if($componente = mysqli_fetch_array($result)){ 
                        
                        $detalle_ped = array($componente['nombre'], $_POST['cantidad'], $componente['precio'], $_POST['cantidad'] * $componente['precio'], $componente['id_componente']);
                        $indice = existeDetalle($detalle_ped);

                        if($indice > -1)
                            actualizaDetalle($indice, $detalle_ped);
                        else
                            $_SESSION["pedido"][] = $detalle_ped;

                        $_SESSION["monto_total_ped"] += $_POST['cantidad'] * $componente['precio'];
                    }
                }
            } 

            for($i=0; $i<count($_SESSION["pedido"]); $i++){
?>
            <tr>
                <td><?php echo $_SESSION["pedido"][$i][0]; ?></td>
                <td><?php echo $_SESSION["pedido"][$i][1]; ?></td>
                <td>$<?php echo $_SESSION["pedido"][$i][2]; ?></td>
                <td>$<?php echo $_SESSION["pedido"][$i][3]; ?></td>
            </tr>
<?php 
            }    
        }
        
        function existeDetalle($detalle_ped){
            $indice = -1;

            for($i=0; $i<count($_SESSION["pedido"]); $i++){
                if($_SESSION["pedido"][$i][0] == $detalle_ped[0])
                    $indice = $i;
            }
            return $indice;
        }

        function actualizaDetalle($i, $detalle_ped){
            $_SESSION["pedido"][$i][1] += $detalle_ped[1];
            $_SESSION["pedido"][$i][3] += $detalle_ped[3];
        }
?>