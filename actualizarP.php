<?php 

$oMysql = new mysqli("localhost", "root", "", "jasap");
 // $conexion = pg_connect("host=localhost port=5432 user=nombreUsuario password=passwordUsuario dbname=nomBD", PGSQL_CONNECT_FORCE_NEW);
// $conexion = pg_connect("host=localhost dbname=BASE_DE_DATOS user=USUARIO password=CONTRASEÑA");		

$Query= "UPDATE proveedores SET 

nombre='".$_POST["nombre"]."', rfc='".$_POST["rfc"]."',
direccion='".$_POST["direccion"]."', telefono='".$_POST["telefono"]."'

where id_proveedor ='".$_POST["idProv"]."'";
          
          //$oMysql->query    seria como Objeto.metodo
$Result = $oMysql->query( $Query );  // se lanza la consulta
    

if($Result!=null)
   header('location: actualizarProv.php');
?>