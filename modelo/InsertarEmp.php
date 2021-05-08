
<?php 

$oMysql = new mysqli("localhost", "root", "", "jasap");
 // $conexion = pg_connect("host=localhost port=5432 user=nombreUsuario password=passwordUsuario dbname=nomBD", PGSQL_CONNECT_FORCE_NEW);
// $conexion = pg_connect("host=localhost dbname=BASE_DE_DATOS user=USUARIO password=CONTRASEÑA");		

$Query= "INSERT INTO empleados VALUES (default,'".$_POST["nombre"]."','".$_POST["direccion"]."','".$_POST["telefono"]."','".$_POST["rfc"]."','".$_POST["correo"]."','".$_POST["usuario"]."','".$_POST["contrasena"]."','".$_POST["categoria"]."')";
          
		  //$oMysql->query    seria como Objeto.metodo
$Result = $oMysql->query( $Query );  // se lanza la consulta
    

if($Result!=null)
   header('location: ../agregarEmp.php');
?>
