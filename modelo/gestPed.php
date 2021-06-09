<?php
    include_once("conexion.php");
    $sql = "SELECT * FROM pedidos ORDER BY id_pedido DESC LIMIT 5";
    $result = mysqli_query($conexion, $sql);
    $numRegistros = $result->num_rows;

    if($numRegistros >0){
?>
            <div class="mostrar">
                <table>
                    <tr class="cabt">
                        <td><strong> Id_pedido</strong></td>
                        <td><strong> Id_proveedor</strong></td>
                        <td><strong> Fecha y hora</strong></td>
                        <td><strong> Componentes</strong></td>
                        <td><strong> Monto Total</strong></td>
                    </tr>
                    <?php 
                        while($pedido = $result->fetch_array()){
                            $sql = "SELECT SUM(cantidad) AS total FROM detalles_p WHERE id_pedido = '".$pedido['id_pedido']."'";
                            $result2 = mysqli_query($conexion, $sql);
                            $productos = $result2->fetch_array();
                    ?>
                    <tr>
                        <td><?php echo $pedido['id_pedido'];?></td>
                        <td><?php echo $pedido['id_proveedor'];?></td>
                        <td><?php echo $pedido['fecha'];?></td>
                        <td><?php echo $productos['total'];?></td>
                        <td>$<?php echo $pedido['monto_total'];?></td>
                    </tr>
                    <?php } ?>
                </table>
            </div>
<?php 
    }
?>