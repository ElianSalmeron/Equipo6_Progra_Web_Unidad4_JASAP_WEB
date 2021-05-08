<?php
    $conexion=mysqli_connect('localhost','root','','jasap');
?>

<?php 
    
        if(isset($_GET['Buscar'])){
            $busqueda = $_GET['busc'];  
                
            $sql="SELECT * from componentes where id_componente like '%$busqueda'";
            $result=mysqli_query($conexion,$sql);
        
            if($mostrar=mysqli_fetch_array($result)){   
                ?>
                    <tr>
                        <td><?php echo $mostrar['id_componente']?></td>
                        <td><?php echo $mostrar['nombre']?></td>
                        <td><?php echo $mostrar['categoria']?></td>
                        <td><?php echo $mostrar['existencias']?></td>
                        <td><?php echo $mostrar['precio']?></td>
                        <td><?php echo $mostrar['descripcion']?></td>
                    </tr>
                <?php    
            }
        }   
    ?>
