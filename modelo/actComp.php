<?php 
            include_once("conexion.php");
            
            if(isset($_GET['Buscar'])){
            $busqueda = $_GET['id'];   
                
            $sql="SELECT * from componentes where id_componente like '%$busqueda'";
            $result = mysqli_query($conexion,$sql);
        
            if($mostrar=mysqli_fetch_array($result)){   
?>
            <div class="register-comp">
                <form id="form-component-register" method="post" action="actualizarC.php">
                    <input class="campos" type="text" name="idComp" value="<?php echo $_GET['id']?>" style="display: none">      
                    <div>
                        <label id="label1" for="nombre">Nombre: </label>
                        <input class="campos" type="text" name="nombre" size="30" value="<?php echo $mostrar['nombre']?>">
                    </div>
                    <div>
                        <label id="label2" for="categoria">Categoría: </label>
                        <select class="cat" name="categoria">
                            <option>Microprocesador</option>
                            <option>Memoria RAM</option>
                            <option>Torre</option>
                            <option>Monitor</option>
                            <option>Cooler</option>
                            <option>Motherboard</option>
                            <option>Almacenamiento</option>
                        </select>
                    </div>
                    <div>
                        <label for="existencias">Existencias: </label>
                        <input class="campos" type="text" name="existencias" size="5px" 
                        value="<?php echo $mostrar['existencias']?>">
                    </div>
                    <div>
                        <label id="label3" for="precio">Precio: </label>
                        <input class="campos" type="text" name="precio" size="5px" 
                               value="<?php echo $mostrar['precio']?>">
                    </div>
                    <div>
                        <label for="descripcion">Descripción: </label>
                        <textarea name="descripcion"><?php echo $mostrar['descripcion']?></textarea>
                    </div>
                </form>
            </div> 
            <div id="botones">
                <input class="button" type="submit" name="" value="Guardar" form="form-component-register"
                onclick = "return validaDatosComp(existencias, precio, 1);">
                <input class="button" type="button" name="" value="Cancelar" onclick="location.href='gestionComp.php'">
            </div>
                <?php    
            }
        }   
    ?>