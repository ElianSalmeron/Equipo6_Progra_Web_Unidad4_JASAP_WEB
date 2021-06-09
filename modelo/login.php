<?php 
session_start();
include_once("conexion.php"); 

if(isset($_POST['user']) && isset($_POST['contraseña'])){
    
    $sql = "SELECT * FROM empleados WHERE nombre_usuario = '".$_POST['user']."' AND password = '".$_POST['contraseña']."'" ;
    $result = mysqli_query($conexion,$sql);

        if($result->num_rows > 0){
            $empleado = $result->fetch_array();

            $_SESSION["rol"] = $empleado["rol"];
            $_SESSION["id"] = $empleado["id_empleado"];
            $_SESSION["nombre"] = $empleado["nombre_emp"];
            

            if($_SESSION["rol"] == "Administrador")
                header('location: ../gestionEmp.php');

            if($_SESSION["rol"] == "Usuario de ventas"){
                $_SESSION["venta"] = array();
                $_SESSION["monto_total"] = 0;
                $_SESSION["pedido"] = array();
                $_SESSION["monto_total_ped"] = 0;
                $_SESSION["proveedor"] = "";
                header('location: ../gestionVen.php');
            }

            if($_SESSION["rol"] == "Técnico")
                header('location: ../consultarVenTec.php');
        }
        else{
            $sql = "SELECT * FROM clientes WHERE nombre_usuario = '".$_POST['user']."' AND password = '".$_POST['contraseña']."'" ;
            $result = mysqli_query($conexion,$sql);

            if($result->num_rows > 0){
                $empleado = $result->fetch_array();

                $_SESSION["rol"] = "Cliente";
                $_SESSION["id"] = $empleado['id_cliente'];
                header('location: ../catalogo.php');
            }
            else
                header('location: ../index.php');
        }    
}
?>