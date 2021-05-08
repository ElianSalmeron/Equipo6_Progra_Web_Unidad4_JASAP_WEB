<?php 
    $conexion = mysqli_connect('localhost','root','','jasap');
    $sql = "SELECT * FROM componentes";
    $result = mysqli_query($conexion, $sql);
    $numRegistros = $result->num_rows;

    if($numRegistros >0){
?>
    <div class="mostrar">
        <table>
            <tr class="cabt">
                <td><strong> id_componente</strong></td>
                <td><strong> Nombre</strong></td>
                <td><strong> Tipo de componente</strong></td>
                <td><strong> Existencias</strong></td>
                <td><strong>Precio</strong></td>
                <td><strong>Descripci&oacute;n</strong></td>
            </tr>
            <?php 
                while($fila = $result->fetch_array()){
            ?>
            <tr>
                <td><?php echo $fila['id_componente']?></td>
                <td><?php echo $fila['nombre']?></td>
                <td><?php echo $fila['categoria']?></td>
                <td><?php echo $fila['existencias']?></td>
                <td><?php echo $fila['precio']?></td>
                <td><?php echo $fila['descripcion']?></td>
                </tr>
            <?php 
                }
            }?>
        </table>
    </div>  