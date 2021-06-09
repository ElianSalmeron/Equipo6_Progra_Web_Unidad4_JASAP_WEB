<?php 
        include_once("conexion.php");

        if(isset($_POST['buscar-comp'])){
            $busqueda = $_POST ['id-comp'];  
                
            $sql = "SELECT * FROM componentes WHERE id_componente = '".$busqueda."'";
            $result = mysqli_query($conexion,$sql);
        
            if($componente = mysqli_fetch_array($result)){   
                ?>
                    <tr>
                        <td><?php echo $componente['id_componente']?></td>
                        <td><?php echo $componente['nombre']?></td>
                        <td><?php echo $componente['categoria']?></td>
                        <td><?php echo $componente['existencias']?></td>
                        <td><?php echo $componente['precio']?></td>
                        <td><?php echo $componente['descripcion']?></td>
                    </tr>
                <?php    
            }
        }   
    ?>