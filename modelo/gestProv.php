<?php 
    include_once("conexion.php");
    $sql = "SELECT * FROM proveedores LIMIT 5";
    $result = mysqli_query($conexion, $sql);
    $numRegistros = $result->num_rows;

    if($numRegistros >0){
?>    

    <div class="mostrar">
        <table>
            <tr class="cabt">
                <td><strong> id_proveedor</strong></td>
                <td><strong> Nombre</strong></td>
                <td><strong> RFC</strong></td>
                <td><strong> Direcci&oacute;n</strong></td>
                <td><strong> Tel&eacute;fono</strong></td>
            </tr>
            <?php 
                while($fila = $result->fetch_array()){
            ?>
            <tr>
                <td><?php echo $fila['id_proveedor']?></td>
                <td><?php echo $fila['nombre']?></td>
                <td><?php echo $fila['rfc']?></td>
                <td><?php echo $fila['direccion']?></td>
                <td><?php echo $fila['telefono']?></td>
            </tr>
            <?php 
                }
            }?>
        </table>
    </div>