<?php 
   include_once("conexion.php");
   
   $sql = "SELECT MAX(id_proveedor) AS id FROM proveedores";
   $result = mysqli_query($conexion, $sql);
   $numRegistros = $result->num_rows;

   if($numRegistros > 0){
      $proveedor = $result->fetch_array();
      $id_proveedor = $proveedor['id'] + 1; 
   }
   else
      $id_proveedor = 1;
   
   $sql = "INSERT INTO proveedores VALUES ('".$id_proveedor."','".$_POST["nombre"]."','".$_POST["rfc"]."','".$_POST["direccion"]."','".$_POST["telefono"]."')";  
   $result = mysqli_query($conexion, $sql);
      
   if($result!=null)
      header('location: ../agregarProv.php');
?>
