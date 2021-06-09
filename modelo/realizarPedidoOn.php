<?php 
    session_start();
    include_once("conexion.php");

    $fecha_array = getdate();
    $fecha = $fecha_array["year"]."-".$fecha_array["mon"]."-".$fecha_array["mday"]." ".$fecha_array["hours"].":".$fecha_array["minutes"].":".$fecha_array["seconds"];

    $sql = "SELECT MAX(id_pedido_On) AS id FROM pedidos_online";
    $result = mysqli_query($conexion, $sql);
    $numRegistros = $result->num_rows;

    if($numRegistros > 0){
        $pedido_online = $result->fetch_array();
        $id_pedido = $pedido_online['id'] + 1;
    }
    else
        $id_pedido = 1;

    $sql = "INSERT INTO pedidos_online VALUES ('".$id_pedido."', '".$_SESSION['id']."', '".$fecha."', '".$_POST['monto_total']."', '".$_POST['direccion']."', '".$_POST['tarjeta']."', 'En preparación')";
    $result = mysqli_query($conexion, $sql);
    
    $sql = "SELECT * FROM detalles_carrito WHERE id_cliente = '".$_SESSION['id']."'";
    $result = mysqli_query($conexion, $sql);

    while($detalle_carrito = $result->fetch_array()){
        $sql2 = "INSERT INTO detalles_po VALUES ('".$id_pedido."', '".$detalle_carrito['id_componente']."', '".$detalle_carrito['cantidad']."')";
        $result2 = mysqli_query($conexion, $sql2);

        $sql3 = "SELECT existencias FROM componentes WHERE id_componente = '".$detalle_carrito['id_componente']."'";
        $result3 = mysqli_query($conexion, $sql3);
        $existencias = $result3->fetch_array()['existencias'];
        $existencias -= $detalle_carrito['cantidad'];

        $sql4 = "UPDATE componentes SET existencias = '".$existencias."' WHERE id_componente = '".$detalle_carrito['id_componente']."'";
        $result4 = mysqli_query($conexion, $sql4);
    }
  
    $sql5 = "DELETE FROM detalles_carrito WHERE id_cliente = '".$_SESSION['id']."'";
    $result5 = mysqli_query($conexion, $sql5);

    header('location: ../segPedido.php');
?>