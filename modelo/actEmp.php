<?php 
            include_once("conexion.php");

            if(isset($_GET['Buscar'])){
            $busqueda = $_GET['id'];  
                
            $sql="SELECT * from empleados where id_empleado like '%$busqueda'";
            $result = mysqli_query($conexion,$sql);
        
            if($mostrar=mysqli_fetch_array($result)){   
?>
            <div class="register-comp">
                <form id="form-component-register" method="post" action="ActualizarE.php">
                        <input class="campos" type="text" name="idEmp" value="<?php echo $_GET['id']?>" style="display: none">
                    <div>
                        <label id="label1" for="nombre">Nombre: </label>
                        <input class="campos" type="text" name="nombre" size="30" value="<?php echo $mostrar['nombre_emp']?>">
                    </div>
                    <div>
                        <label id="label2" for="direccion">Direcci&oacute;n: </label>
                        <input class="campos" type="text" name="direccion" size="30"
                               value="<?php echo $mostrar['direccion']?>">
                    </div>
                    <div>
                        <label id="label3" for="telefono">Tel&eacute;fono: </label>
                        <input class="campos" type="text" name="telefono" size="30"
                               value="<?php echo $mostrar['telefono']?>" maxlength = "10">
                    </div>
                    <div>
                        <label id="label4" for="rfc">RFC: </label>
                        <input class="campos" type="text" name="rfc" size="30"
                               value="<?php echo $mostrar['rfc']?>" maxlength = "13">
                    </div>
                    <div>
                        <label id="label5" for="correo">Correo electr&oacute;nico: </label>
                        <input class="campos" type="text" name="correo" size="21"
                               value="<?php echo $mostrar['correo_electronico']?>">
                    </div>
                    <div>
                        <label id="label6" for="usuario">Nombre de usuario: </label>
                        <input class="campos" type="text" name="usuario" size="20"
                               value="<?php echo $mostrar['nombre_usuario']?>"
                               >
                    </div>
                    <div>
                        <label id="label7" for="contrasena">Contrase&ntilde;a: </label>
                        <input class="campos" type="password" name="contrasena" size="29"
                               value="<?php echo $mostrar['password']?>" maxlength = "12">
                    </div>
                </form>
            </div>
            <div id="botones">
                <input class="button" type="submit" name="Guardar" value="Guardar" form="form-component-register"
                onclick = "return validaDatosEmp(telefono, rfc, correo, 1);">
                <input class="button" type="button" name="" value="Cancelar" onclick="location.href='gestionEmp.php'">
            </div>
                <?php    
            }
        }   
    ?>