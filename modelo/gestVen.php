<?php
    include_once("conexion.php");
    $sql = "SELECT * FROM ventas ORDER BY id_venta DESC LIMIT 5";
    $result = mysqli_query($conexion, $sql);
    $numRegistros = $result->num_rows;

    if($numRegistros >0){
?>
            <div class="mostrar">
                <table>
                    <tr class="cabt">
                        <td><strong> Id_venta</strong></td>
                        <td><strong> Id_empleado</strong></td>
                        <td><strong> Fecha y hora</strong></td>
                        <td><strong> Componentes</strong></td>
                        <td><strong> Monto Total</strong></td>
                    </tr>
                    <?php 
                        while($venta = $result->fetch_array()){
                            $sql = "SELECT SUM(cantidad) AS total FROM detalles_ventas WHERE id_venta = '".$venta['id_venta']."'";
                            $result2 = mysqli_query($conexion, $sql);
                            $productos = $result2->fetch_array();
                    ?>
                    <tr>
                        <td><?php echo $venta['id_venta']; ?></td>
                        <td><?php echo $venta['id_empleado']; ?></td>
                        <td><?php echo $venta['fecha']; ?></td>
                        <td><?php echo $productos['total'];?></td>
                        <td>$<?php echo $venta['monto_total']; ?></td>
                    </tr>
                    <?php } ?>
                </table>
            </div>
    <?php } ?>