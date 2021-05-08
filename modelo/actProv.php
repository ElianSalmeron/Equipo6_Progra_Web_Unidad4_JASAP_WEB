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
             <div class="register-comp">
                <form id="form-component-register" method="post" action="actualizarP.php">
                  
                    <input class="campos" type="text" name="idProv" value="<?php echo $_GET['id']?>" style="display: none">
                    
                    
                    
                    <div>
                        <label id="label1" for="nombre">Nombre: </label>
                        <input class="campos" type="text" name="nombre" size="30" value="<?php echo $mostrar["nombre"]?>">
                    </div>
                    <div>
                        <label id="label2" for="rfc">RFC: </label>
                        <input class="campos" type="text" name="rfc" size="30" value="<?php echo $mostrar["rfc"]?>" maxlength = "12">
                    </div>
                    <div>
                        <label id="label3" for="direccion">Direcci&oacute;n: </label>
                        <input class="campos" type="text" name="direccion" size="30"
                               value="<?php echo $mostrar["direccion"]?>">
                    </div>
                    <div>
                        <label id="label4" for="telefono">Tel&eacute;fono: </label>
                        <input class="campos" type="text" name="telefono" size="10" value="<?php echo $mostrar["telefono"]?>" maxlength="10">
                    </div>
                </form>
            </div>
            <div id="botones">
                <input class="button" type="submit" name="Guardar" value="Guardar" form="form-component-register"
                onclick = "return validaDatosProv(rfc, telefono, 1);">
                <input class="button" type="button" name="" value="Cancelar" onclick="location.href='gestionProv.php'">
            </div>
                <?php    
            }
        }   
    ?>