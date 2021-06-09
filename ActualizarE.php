<?php 
   include_once("modelo/conexion.php");	

   $sql = "UPDATE empleados SET nombre_emp='".$_POST["nombre"]."' , direccion='".$_POST["direccion"]."',
         telefono='".$_POST["telefono"]."' , rfc='".$_POST["rfc"]."' ,
         correo_electronico='".$_POST["correo"]."' , nombre_usuario='".$_POST["usuario"]."' ,
         password='".$_POST["contrasena"]."'
         where id_empleado ='".$_POST["idEmp"]."'";
            
   $result = mysqli_query($conexion, $sql);
      
   if($result!=null)
      header('location: actualizarEmp.php');
?>
