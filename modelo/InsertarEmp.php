<?php 
   include_once("conexion.php");

   $sql = "SELECT MAX(id_empleado) AS id FROM empleados";
   $result = mysqli_query($conexion, $sql);
   $numRegistros = $result->num_rows;

   if($numRegistros > 0){
      $empleado = $result->fetch_array();
      $id_empleado = $empleado['id'] + 1; 
   }
   else
      $id_empleado = 1;

   $sql = "INSERT INTO empleados VALUES ('".$id_empleado."','".$_POST["nombre"]."','".$_POST["direccion"]."','".$_POST["telefono"]."','".$_POST["rfc"]."','".$_POST["correo"]."','".$_POST["usuario"]."','".$_POST["contrasena"]."','".$_POST["categoria"]."')";
   $result = mysqli_query($conexion, $sql);
      
   if($result!=null)
      header('location: ../agregarEmp.php');
?>
