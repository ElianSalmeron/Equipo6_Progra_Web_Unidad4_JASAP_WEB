<?php 
        include_once("conexion.php");

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

                    <form id="prov-elim">
                        <input style="display:none" type="text" name="elim-prov" value= <?php echo $mostrar['id_proveedor'] ?>> 
                    </form> 
                <?php    
            }
    }
                
    if(isset($_GET['Eliminar-Prov'])){
        $busqueda = $_GET['elim-prov'];
        
        $sql = "DELETE FROM proveedores WHERE id_proveedor='".$busqueda."'";
        $result =mysqli_query($conexion, $sql);
        if($result!=null)
            echo "<div align='center'> <h3>¡Proveedor eliminado correctamente!</h3><br> </div>"; 
        else
  	        print("No se pudo eliminar");   
    }        
?>
     