<?php  
        include_once("conexion.php");

        if(isset($_GET['Buscar'])){
            $busqueda = $_GET['busc'];  
             
            $sql = "SELECT * FROM empleados WHERE id_empleado like '%$busqueda'";
            $result = mysqli_query($conexion,$sql);
        
                if($mostrar = mysqli_fetch_array($result)){   
?>
                    <tr>
                        <td><?php echo $mostrar['id_empleado']?></td>
                        <td><?php echo $mostrar['nombre_emp']?></td>
                        <td><?php echo $mostrar['rol']?></td>
                        <td><?php echo $mostrar['telefono']?></td>
                        <td><?php echo $mostrar['rfc']?></td>
                        <td><?php echo $mostrar['correo_electronico']?></td>
                    </tr>
                    
                    <form id="emp-elim">
                        <input style="display:none" type="text" name="elim-emp" value= <?php echo $mostrar['id_empleado'] ?>> 
                    </form> 
                <?php    
            }
    }
              
    if(isset($_GET['Eliminar'])){
        $busqueda = $_GET['elim-emp'];  
        $sql = "DELETE FROM empleados WHERE id_empleado like '%$busqueda'";
        $result = mysqli_query($conexion, $sql);
        if($result!=null){
            echo "<div align='center'> <h3>¡Empleado eliminado correctamente!</h3><br> </div>";
        }
        else
  	        print("No se pudo eliminar");   
    }        
?>