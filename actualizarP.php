<?php 
   include_once("modelo/conexion.php");
      
   $sql = "UPDATE proveedores SET nombre='".$_POST["nombre"]."', rfc='".$_POST["rfc"]."',
         direccion='".$_POST["direccion"]."', telefono='".$_POST["telefono"]."' 
         where id_proveedor ='".$_POST["idProv"]."'";
            
   $result = mysqli_query($conexion, $sql); 
      
   if($result!=null)
      header('location: actualizarProv.php');
?>