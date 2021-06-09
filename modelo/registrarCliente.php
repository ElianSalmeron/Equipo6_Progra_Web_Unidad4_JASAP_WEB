<?php 
   include_once("conexion.php");

   $sql = "SELECT MAX(id_cliente) AS id FROM clientes";
   $result = mysqli_query($conexion, $sql);
   $numRegistros = $result->num_rows;

   if($numRegistros > 0){
      $cliente = $result->fetch_array();
      $id_cliente = $cliente['id'] + 1; 
   }
   else
      $id_cliente = 1;

   if($_POST["telefono"] == "")
      $sql = "INSERT INTO clientes VALUES ('".$id_cliente."','".$_POST["nombre_cliente"]."','".$_POST["usuario"]."','".$_POST["correo"]."','".$_POST["password"]."', default, default, default)";
   else 
      $sql = "INSERT INTO clientes VALUES ('".$id_cliente."','".$_POST["nombre_cliente"]."','".$_POST["usuario"]."','".$_POST["correo"]."','".$_POST["password"]."','".$_POST["telefono"]."', default, default)";

   $result = mysqli_query($conexion, $sql);

   if($_POST["direccion"] != ""){

      $sql = "SELECT MAX(id_direccion) AS id FROM direcciones";
      $result = mysqli_query($conexion, $sql);
      $numRegistros = $result->num_rows;

      if($numRegistros > 0){
         $direccion = $result->fetch_array();
         $id_direccion = $direccion['id'] + 1;
      }
      else
         $id_direccion = 1;

      $sql = "INSERT INTO direcciones VALUES ('".$id_direccion."', '".$id_cliente."','".$_POST["direccion"]."')";
      $result = mysqli_query($conexion, $sql);

      $sql = "UPDATE clientes SET direccion_predet = '".$id_direccion."' WHERE id_cliente = '".$id_cliente."'";
      $result = mysqli_query($conexion, $sql);
   }
      
   if($result!=null)
      header('location: ../index.php');
?>