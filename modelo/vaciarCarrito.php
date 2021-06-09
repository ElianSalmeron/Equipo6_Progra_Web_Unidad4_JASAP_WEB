<?php 
    session_start();
    include_once("conexion.php");

    if(isset($_SESSION['id'])){
        $sql = "DELETE FROM detalles_carrito WHERE id_cliente = '".$_SESSION['id']."'";
        $result = mysqli_query($conexion, $sql);
    }
    header('location: ../carrito.php')
?>