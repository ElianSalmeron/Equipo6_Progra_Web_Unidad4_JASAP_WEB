<?php
        include_once("modelo/conexion.php");

        if(isset($_POST['Generar'])){
            $fecha_inicial = $_POST['fecha_inicio'];
            $fecha_final = $_POST['fecha_final'];

            $sql = "SELECT COUNT(id_pedido) AS total FROM pedidos WHERE CAST(fecha AS DATE) BETWEEN '".$fecha_inicial."' AND '".$fecha_final."'";
            $result = mysqli_query($conexion,$sql);
            $pedidos = mysqli_fetch_array($result);
            $num_pedidos = $pedidos['total'];

            $sql = "SELECT SUM(monto_total) AS total_pedidos FROM pedidos WHERE CAST(fecha AS DATE) BETWEEN '".$fecha_inicial."' AND '".$fecha_final."'";
            $result = mysqli_query($conexion, $sql);
            $total_pedidos = mysqli_fetch_array($result);
            $costos = $total_pedidos['total_pedidos'];
            $costos = round($costos, 2);
            
            $sql = "SELECT * FROM pedidos WHERE CAST(fecha AS DATE) BETWEEN '".$fecha_inicial."' AND '".$fecha_final."'";
            $result = mysqli_query($conexion,$sql);

            $fecha_array = getdate();
            $fecha = $fecha_array["year"]."-".$fecha_array["mon"]."-".$fecha_array["mday"]." ".$fecha_array["hours"].":".$fecha_array["minutes"].":".$fecha_array["seconds"];
            
            if($num_pedidos > 0){
?>
            <div class="etiquetas">
                <label for="user"> Nombre del usuario: <?php echo $_SESSION['nombre']; ?></label>
                <label class="etiquetas1" for="fecha-hora"> Fecha y hora: <?php echo $fecha; ?></label>
            </div>

            <div class="etiquetas">
                <label for="pedidosR"> Pedidos realizados a proveedores: <?php echo $num_pedidos; ?> </label>
            </div>

            <div class="most-ped">
                <table>
                    <tr class="cabt">
                        <td><strong> Id_pedido</strong></td>
                        <td><strong> Proveedor</strong></td>
                        <td><strong> Componentes</strong></td>
                        <td><strong> Precio Total</strong></td>
                    </tr>
<?php 
                while($pedido = $result->fetch_array()){
                    
                    // Obtener detalles del pedido
                    $detalles = "";
                    $sql = "SELECT * FROM detalles_p WHERE id_pedido = '".$pedido['id_pedido']."'";
                    $result2 = mysqli_query($conexion,$sql);

                    while($detalle_comp = $result2->fetch_array()){
                        $sql = "SELECT nombre FROM componentes WHERE id_componente = '".$detalle_comp['id_componente']."'";
                        $result3 = mysqli_query($conexion, $sql);
                        $componente = $result3->fetch_array();

                        $detalles .= $componente['nombre']." - Cantidad: ".$detalle_comp['cantidad'];
                    }
                    
                    // Nombre del proveedor
                    $sql = "SELECT * FROM proveedores WHERE id_proveedor = '".$pedido['id_proveedor']."'";
                    $result3 = mysqli_query($conexion, $sql);
                    $proveedor = mysqli_fetch_array($result3);
?>
                    <tr>
                        <td><?php echo $pedido['id_pedido']; ?></td>
                        <td><?php echo $proveedor['nombre']; ?></td>
                        <td><?php echo $detalles; ?></td>
                        <td>$<?php echo $pedido['monto_total']; ?></td>
                    </tr>
<?php 
                }
            }
?>
                    </table>
                </div>

<?php 
            $sql = "SELECT COUNT(id_venta) AS total FROM ventas WHERE CAST(fecha AS DATE) BETWEEN '".$fecha_inicial."' AND '".$fecha_final."'";
            $result = mysqli_query($conexion,$sql);
            $ventas = mysqli_fetch_array($result);
            $num_ventas = $ventas['total'];

            $sql = "SELECT SUM(monto_total) AS total_ventas FROM ventas WHERE CAST(fecha AS DATE) BETWEEN '".$fecha_inicial."' AND '".$fecha_final."'";
            $result = mysqli_query($conexion, $sql);
            $total_ventas = mysqli_fetch_array($result);
            $ganacias_ventas = $total_ventas['total_ventas'];
            $ganacias_ventas = round($ganacias_ventas, 2);

            $sql = "SELECT * FROM ventas WHERE CAST(fecha AS DATE) BETWEEN '".$fecha_inicial."' AND '".$fecha_final."'";
            $result = mysqli_query($conexion,$sql);

            if($num_ventas > 0){
?>
            <div class="etiquetas">
                <label for="ventasR"> Ventas realizadas: <?php echo $num_ventas; ?></label>
            </div>

            <div class="most-ven">
                <table>
                    <tr class="cabt">
                        <td><strong> Id_venta</strong></td>
                        <td><strong> Componentes</strong></td>
                        <td><strong> Precio Total</strong></td>
                    </tr>
<?php
            while($venta = $result->fetch_array()){

                // Obtener detalles de la venta
                $detalles = "";
                $sql = "SELECT * FROM detalles_ventas WHERE id_venta = '".$venta['id_venta']."'";
                $result2 = mysqli_query($conexion,$sql);

                while($detalle_comp = $result2->fetch_array()){
                    $sql = "SELECT nombre FROM componentes WHERE id_componente = '".$detalle_comp['id_componente']."'";
                    $result3 = mysqli_query($conexion, $sql);
                    $componente = $result3->fetch_array();

                    $detalles .= $componente['nombre']." - Cantidad: ".$detalle_comp['cantidad']."\n";
                }
?>
                    <tr>
                        <td><?php echo $venta['id_venta']; ?></td>
                        <td><?php echo $detalles; ?></td>
                        <td>$<?php echo $venta['monto_total']; ?></td>
                    </tr>
<?php 
            }
?>
                </table> 
            </div>

            <div class="etiquetas">
                <label for="tCostos"> Total de Costos: $<?php echo $costos ?></label>
                <label class="etiquetas1" for="tVentas"> Total de Ventas: $<?php echo $ganacias_ventas; ?></label>
            </div>

            <div class="botones">
                <form>
                    <input type="button" id="boton" name="salir" value="Salir" onclick="location.href='gestionEmp.php'">
                </form>
            </div>
<?php
            }
        }
?>