<?php 
    include_once("conexion.php");

    if(isset($_POST['consultar'])){
        $id_venta = $_POST['id-venta'];   

        $sql = "SELECT * FROM ventas WHERE id_venta = '".$id_venta."'";
        $result = mysqli_query($conexion,$sql);

        if($venta = mysqli_fetch_array($result)){
            $sql = "SELECT nombre_emp FROM empleados WHERE id_empleado = '".$venta['id_empleado']."'";
            $result = mysqli_query($conexion,$sql);
            $empleado = mysqli_fetch_array($result);
            $nombre_empleado = $empleado['nombre_emp'];

            //Obtener detalles de la venta
            $detalles = array();

            $sql = "SELECT * FROM detalles_ventas WHERE id_venta = '".$id_venta."'";
            $result = mysqli_query($conexion,$sql);

            while($detalle_comp = $result->fetch_array()){
                $sql = "SELECT nombre, precio FROM componentes WHERE id_componente = '".$detalle_comp['id_componente']."'";
                $result2 = mysqli_query($conexion,$sql);
                $componente = $result2->fetch_array();

                $detalle = array($componente['nombre'], $detalle_comp['cantidad'], $componente['precio'], $detalle_comp['cantidad'] * $componente['precio']);
                $detalles[] = $detalle;
            }
?>
            <div class="form-vent-div">
                <div class="izquierda">
                    <div>
                        <label for="idventa"> Id de la venta: </label>
                        <input id="iz" type="text" name="idventa" value= <?php echo $id_venta; ?> disabled>
                    </div>
                    <div>
                        <label for="montot"> Monto total: </label>
                        <input id="iz" type="text" name="monto" value=$<?php echo $venta['monto_total']; ?> disabled>
                    </div>
                </div>
                <div class="derecha">
                    <div>
                        <label for="idemp"> Id del empleado: </label>
                        <input id="de" type="text" name="idemp" value= <?php echo $venta['id_empleado']; ?> >
                    </div>
                    <div>
                        <label for="vendedor"> Vendedor: </label>
                        <input id="de" type="text" name="vendedor" value="<?php echo $nombre_empleado; ?>" disabled>
                    </div>
                    <div>
                        <label for="fecha">Fecha y hora: </label>
                        <input id="de" type="text" name="fecha" value="<?php echo $venta['fecha']; ?>" disabled>
                    </div>
                </div>
            </div>
            

            <div class="mostrar">
                <h2>Componentes</h2>
                <table>
                    <tr class="cabt">
                        <td><strong> Componente</strong></td>
                        <td><strong> Cantidad</strong></td>
                        <td><strong> Precio unitario</strong></td>
                        <td><strong> Precio total</strong></td>
                    </tr>
                    <?php 
                        for($i=0; $i<count($detalles); $i++){
                    ?>
                    <tr>
                        <td><?php echo $detalles[$i][0] ?></td>
                        <td><?php echo $detalles[$i][1] ?></td>
                        <td>$<?php echo $detalles[$i][2] ?></td>
                        <td>$<?php echo $detalles[$i][3] ?></td>
                    </tr>
                    <?php } ?>
                </table>
            </div>
<?php 
    }
} ?>