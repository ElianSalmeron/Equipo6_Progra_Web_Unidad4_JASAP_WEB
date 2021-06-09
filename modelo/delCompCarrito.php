<?php
    session_start();
    include_once("conexion.php");

    if(isset($_POST['eliminar'])){
        $sql = "DELETE FROM detalles_carrito WHERE id_cliente = '".$_SESSION['id']."' AND id_componente = '".$_POST['id_componente']."'";
        $result = mysqli_query($conexion, $sql);
    }

    if(isset($_POST['actualizar'])){
        $sql = "UPDATE detalles_carrito SET cantidad = '".$_POST['cantidad']."' WHERE id_cliente = '".$_SESSION['id']."' AND id_componente = '".$_POST['id_componente']."'";
        $result = mysqli_query($conexion, $sql);
    }

    header('location: ../carrito.php');
?>