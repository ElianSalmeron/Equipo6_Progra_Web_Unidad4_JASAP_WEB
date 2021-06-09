<?php 
    include_once("conexion.php");
    $sql = "SELECT * FROM empleados LIMIT 5";
    $result = mysqli_query($conexion, $sql);
    $numRegistros = $result->num_rows;

    if($numRegistros >0){
?>

    <div class="mostrar">
        <table>
            <tr class="cabt">
                <td><strong> id_empleado</strong></td>
                <td><strong> Nombre</strong></td>
                <td><strong> Teléfono</strong></td>
                <td><strong>RFC</strong></td>
                <td><strong>Correo</strong></td>
                <td><strong> Rol</strong></td>
            </tr>
            <?php 
                while($fila = $result->fetch_array()){
            ?>
            <tr>
                <td><?php echo $fila['id_empleado']?></td>
                <td><?php echo $fila['nombre_emp']?></td>
                <td><?php echo $fila['telefono']?></td>
                <td><?php echo $fila['rfc']?></td>
                <td><?php echo $fila['correo_electronico']?></td>
                <td><?php echo $fila['rol']?></td>
            </tr>
            <?php
                }
            }?>
        </table>
    </div>