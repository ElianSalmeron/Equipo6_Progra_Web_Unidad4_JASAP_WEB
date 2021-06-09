<?php  
session_start();
include_once("conexion.php");

if(isset($_POST["datosusuario"])){
    
   $sql="update clientes set nombre_cliente ='".$_POST['nombre']."', correo_electronico='".$_POST['correo']."', telefono='".$_POST['telefono']."', nombre_usuario='".$_POST['usuario']."', password='".$_POST['contra']."'
   where id_cliente='".$_SESSION['id']."'";
    $result=mysqli_query($conexion, $sql);
}
header("location: ../perfil.php")
?>
 
    