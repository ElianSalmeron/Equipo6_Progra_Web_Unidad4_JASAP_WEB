<?php 
   include_once("modelo/conexion.php");

   $sql = "UPDATE componentes SET nombre='".$_POST["nombre"]."', categoria='".$_POST["categoria"]."',
           categoria='".$_POST["categoria"]."', existencias='".$_POST["existencias"]."', 
           precio='".$_POST["precio"]."', descripcion='".$_POST["descripcion"]."'
           where id_componente ='".$_POST["idComp"]."'";

   $result = mysqli_query($conexion, $sql);
      
   if($result!=null)
      header('location: actualizarComp.php');
?>
