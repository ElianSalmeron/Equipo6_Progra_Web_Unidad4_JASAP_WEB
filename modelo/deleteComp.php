<?php 
        include_once("conexion.php");

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

                    <form id="comp-elim">
                        <input style="display:none" type="text" name="elim-com" value= <?php echo $mostrar['id_componente'] ?>> 
                    </form> 
                <?php    
            }
    }
                
    if(isset($_GET['Eliminar-Comp'])){
        $busqueda = $_GET['elim-com'];
        
        $sql = "DELETE from componentes where id_componente='".$busqueda."'";
        $result = mysqli_query($conexion, $sql);
        if($result!=null)
            echo "<div align='center'> <h3>¡Componente eliminado correctamente!</h3><br> </div>";   
        else
  	        print("No se pudo eliminar");   
    }        
?>