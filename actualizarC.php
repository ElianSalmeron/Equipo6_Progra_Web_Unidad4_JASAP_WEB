<?php 

$oMysql = new mysqli("localhost", "root", "", "jasap");
 // $conexion = pg_connect("host=localhost port=5432 user=nombreUsuario password=passwordUsuario dbname=nomBD", PGSQL_CONNECT_FORCE_NEW);
// $conexion = pg_connect("host=localhost dbname=BASE_DE_DATOS user=USUARIO password=CONTRASEÑA");		

$Query= "UPDATE componentes SET 

nombre='".$_POST["nombre"]."', categoria='".$_POST["categoria"]."',
categoria='".$_POST["categoria"]."', existencias='".$_POST["existencias"]."', 
precio='".$_POST["precio"]."', descripcion='".$_POST["descripcion"]."'

where id_componente ='".$_POST["idComp"]."'";
          
          //$oMysql->query    seria como Objeto.metodo
$Result = $oMysql->query( $Query );  // se lanza la consulta
    

if($Result!=null)
   header('location: actualizarComp.php');
?>
