
<?php 

$oMysql = new mysqli("localhost", "root", "", "jasap");
 // $conexion = pg_connect("host=localhost port=5432 user=nombreUsuario password=passwordUsuario dbname=nomBD", PGSQL_CONNECT_FORCE_NEW);
// $conexion = pg_connect("host=localhost dbname=BASE_DE_DATOS user=USUARIO password=CONTRASEÑA");		

$Query= "UPDATE empleados SET 

nombre_emp='".$_POST["nombre"]."' , direccion='".$_POST["direccion"]."',
telefono='".$_POST["telefono"]."' , rfc='".$_POST["rfc"]."' ,
correo_electronico='".$_POST["correo"]."' , nombre_usuario='".$_POST["usuario"]."' ,
password='".$_POST["contrasena"]."'

where id_empleado ='".$_POST["idEmp"]."'";
          
          //$oMysql->query    seria como Objeto.metodo
$Result = $oMysql->query( $Query );  // se lanza la consulta
    

if($Result!=null)
   header('location: actualizarEmp.php');
?>
