<?php
    $conexion=mysqli_connect('localhost','root','','jasap');
?>

 <?php 
    
        if(isset($_GET['Buscar'])){
            $busqueda = $_GET['id'];  
                
            $sql="SELECT * from proveedores where id_proveedor like '%$busqueda'";
            $result=mysqli_query($conexion,$sql);
        
            if($mostrar=mysqli_fetch_array($result)){   
                ?>
                    <tr>
                        <td><?php echo $mostrar['id_proveedor']?></td>
                        <td><?php echo $mostrar['nombre']?></td>
                        <td><?php echo $mostrar['rfc']?></td>
                        <td><?php echo $mostrar['direccion']?></td>
                        <td><?php echo $mostrar['telefono']?></td>
                    </tr>
                <?php    
            }
        }   
    ?> 