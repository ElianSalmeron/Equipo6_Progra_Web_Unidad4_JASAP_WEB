<?php 
    session_start();
    include_once("conexion.php");

    $sql = "SELECT * FROM proveedores WHERE nombre = '".$_SESSION['proveedor']."'";
    $result = mysqli_query($conexion, $sql);
    $proveedor = $result->fetch_array();
    $id_proveedor = $proveedor['id_proveedor'];
 
    $fecha_array = getdate();
    $fecha = $fecha_array["year"]."-".$fecha_array["mon"]."-".$fecha_array["mday"]." ".$fecha_array["hours"].":".$fecha_array["minutes"].":".$fecha_array["seconds"];

    $sql = "SELECT MAX(id_pedido) AS id FROM pedidos";
    $result = mysqli_query($conexion, $sql);
    $numRegistros = $result->num_rows;

    if($numRegistros > 0){
        $pedido = $result->fetch_array();
        $id_pedido = $pedido['id'] + 1;
    }
    else
        $id_pedido = 1;
    
    /*$sql = "INSERT INTO pedidos VALUES (default,'".$id_proveedor."','".$_SESSION["monto_total_ped"]."','".$fecha."')";*/
    $sql = "INSERT INTO pedidos VALUES ('".$id_pedido."','".$id_proveedor."','".$_SESSION["monto_total_ped"]."','".$fecha."')";
    $result = mysqli_query($conexion, $sql);

    /*$sql = "SELECT * FROM pedidos WHERE fecha = '".$fecha."'";
    $result = mysqli_query($conexion, $sql);
    $pedido = $result->fetch_array();
    $id_pedido = $pedido['id_pedido'];*/

    for($i=0; $i<count($_SESSION["pedido"]); $i++){
        $sql = "INSERT INTO detalles_p VALUES ('".$id_pedido."','".$_SESSION["pedido"][$i][4]."','".$_SESSION["pedido"][$i][1]."')";
        $result = mysqli_query($conexion, $sql);
    }

    if($result!=null){
        $_SESSION["monto_total_ped"] = 0;
        $_SESSION["pedido"] = array();
        $_SESSION["proveedor"] = "";
        header('location: ../gestionPed.php');
    }
?>