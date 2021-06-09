<?php 
    include_once("conexion.php");

    if(isset($_POST['consultar-ped'])){
        $id_pedido = $_POST['id'];   

        $sql = "SELECT * FROM pedidos WHERE id_pedido = '".$id_pedido."'";
        $result = mysqli_query($conexion,$sql);

        if($pedido = mysqli_fetch_array($result)){

            //Obtener detalles del pedido
            $detalles_ped = array();

            $sql = "SELECT * FROM detalles_p WHERE id_pedido = '".$id_pedido."'";
            $result = mysqli_query($conexion,$sql);

            while($detalle_comp = $result->fetch_array()){
                $sql = "SELECT nombre, precio FROM componentes WHERE id_componente = '".$detalle_comp['id_componente']."'";
                $result2 = mysqli_query($conexion,$sql);
                $componente = $result2->fetch_array();

                $detalle_ped = array($componente['nombre'], $detalle_comp['cantidad'], $componente['precio'], $detalle_comp['cantidad'] * $componente['precio']);
                $detalles_ped[] = $detalle_ped;
            }
?>
                <div class="form-vent-div">
                    <div class="izquierda">
                        <div>
                            <label for="idped">Id del pedido: </label>
                            <input id="iz" type="text" name="idped" value=<?php echo $id_pedido ?> disabled>
                        </div>
                        <div>
                            <label for="montot">Monto total: </label>
                            <input id="iz" type="text" name="monto" value=$<?php echo $pedido['monto_total'] ?> disabled>
                        </div>
                    </div>
                    <div class="derecha">
                        <div>
                            <label for="idprov">Id del proveedor: </label>
                            <input id="de" type="text" name="idprov" value=<?php echo $pedido['id_proveedor'] ?> disabled>
                        </div>
                        <div>
                            <label for="fecha">Fecha y hora: </label>
                            <input id="de" type="text" name="fecha" value="<?php echo $pedido['fecha'] ?>" disabled>
                        </div> 
                    </div>
                </div>
            

            <div class="mostrar">
                <h2>Componentes:</h2>
                <table>
                    <tr class="cabt">
                        <td><strong> Componente</strong></td>
                        <td><strong> Cantidad</strong></td>
                        <td><strong> Precio unitario</strong></td>
                        <td><strong> Precio total</strong></td>
                    </tr>
                    <?php 
                        for($i=0; $i<count($detalles_ped); $i++){
                    ?>
                    <tr>
                        <td><?php echo $detalles_ped[$i][0] ?></td>
                        <td><?php echo $detalles_ped[$i][1] ?></td>
                        <td>$<?php echo $detalles_ped[$i][2] ?></td>
                        <td>$<?php echo $detalles_ped[$i][3] ?></td>
                    </tr>
                    <?php } ?>
                </table>
            </div>
<?php 
        }
} ?>