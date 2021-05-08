<?php 

$oMysql = new mysqli("localhost", "root", "", "jasap");

$Query = "SELECT * FROM empleados WHERE nombre_usuario = '".$_POST["usuario"]."' AND password = '".$_POST["contraseña"]."'" ;
$result = $oMysql->query( $Query );  

if($result!=null){
    $numRegistros = $result->num_rows;

    if($numRegistros >0){
        $empleado = $result->fetch_array();
        
        if($empleado["rol"] == "Administrador")
            header('location: ../gestionEmp.php');
    }
    else{
        echo "<script>alert('Usuario o contraseña incorrecta');</script>";
    }
}
?>