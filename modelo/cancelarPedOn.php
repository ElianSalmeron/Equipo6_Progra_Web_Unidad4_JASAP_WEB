<?php 
    if(isset($_POST['Cancelar-Ped'])){
        $fecha_array = getdate();
        $fecha = $fecha_array["year"]."-".$fecha_array["mon"]."-".$fecha_array["mday"]." ".$fecha_array["hours"].":".$fecha_array["minutes"].":".$fecha_array["seconds"];
        $fecha_actual = new DateTime($fecha);

        $sql4 = "SELECT * FROM  pedidos_online WHERE id_pedido_On = '".$_POST['id_ped']."' AND id_cliente = '".$_SESSION['id']."'";
        $result4 = mysqli_query($conexion, $sql4);

        if($pedido_on = $result4->fetch_array()){
            $fecha_pedido = new DateTime($pedido_on['fecha']);
            $diff = $fecha_actual->diff($fecha_pedido);

            if($pedido_on['estado'] != 'Cancelado'){

                if($diff->days == 0){
                    $sql5 = "UPDATE pedidos_online SET estado = 'Cancelado' WHERE id_pedido_On = '".$pedido_on['id_pedido_On']."' AND id_cliente = '".$_SESSION['id']."'";
                    $result5 = mysqli_query($conexion, $sql5);

                    $sql6 = "SELECT * FROM detalles_po WHERE id_pedido_On = '".$pedido_on['id_pedido_On']."'";
                    $result6 = mysqli_query($conexion, $sql6);

                    while($det_componente = $result6->fetch_array()){
                        $sql7 = "SELECT existencias FROM componentes WHERE id_componente = '".$det_componente['id_componente']."'";
                        $result7 = mysqli_query($conexion, $sql7);
                        $existencias = $result7->fetch_array()['existencias'];
                        $existencias += $det_componente['cantidad'];
                        
                        $sql8 = "UPDATE componentes SET existencias = '".$existencias."' WHERE id_componente = '".$det_componente['id_componente']."'";
                        $result8 = mysqli_query($conexion, $sql8);
                    }

                    echo "<br><div align='center'><h3>¡Pedido cancelado correctamente!</h3></div>";
                }
                else
                    echo "<br><div align='center'><h3>¡No es posible cancelar el pedido!</h3></div>";
            }
            else
                echo "<br><div align='center'><h3>¡El pedido ya ha sido cancelado anteriormente!</h3></div>";
        }
        else
            echo "<br><div align='center'><h3>¡No se ha encontrado el pedido!</h3></div>";
    }
?>