<?php 

$oMysql = new mysqli("localhost", "root", "", "jasap");

if($_POST["telefono"] == "")
   $Query = "INSERT INTO clientes VALUES (default,'".$_POST["nombre_cliente"]."','".$_POST["usuario"]."','".$_POST["correo"]."','".$_POST["password"]."', default)";
else 
   $Query = "INSERT INTO clientes VALUES (default,'".$_POST["nombre_cliente"]."','".$_POST["usuario"]."','".$_POST["correo"]."','".$_POST["password"]."','".$_POST["telefono"]."')";

$Result = $oMysql->query( $Query );  

if($_POST["direccion"] != ""){
   $Query = "SELECT * FROM clientes WHERE nombre_cliente = '".$_POST["nombre_cliente"]."'";
   $result = $oMysql->query( $Query );  
   $cliente = $result->fetch_array();

   $Query = "INSERT INTO direcciones VALUES (default, '".$cliente['id_cliente']."','".$_POST["direccion"]."')";
   $result = $oMysql->query( $Query ); 
}
    
if($Result!=null)
   header('location: ../crearCuenta.php');
?>