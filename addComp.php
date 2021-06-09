<?php 
    session_start();
    include_once("modelo/conexion.php");

    if(isset($_POST['Agregar'])){

            if(existeDetalle($conexion))
                actualizaDetalle($conexion);
            else{
                $sql = "INSERT INTO detalles_carrito VALUES ('".$_SESSION['id']."', '".$_POST['id_componente']."', '".$_POST['cantidad']."')";
                $result = mysqli_query($conexion,$sql);
            }

            header('location: carrito.php');
    }

    function existeDetalle($conexion){
        $sql = "SELECT * FROM detalles_carrito WHERE id_cliente = '".$_SESSION['id']."' AND id_componente = '".$_POST['id_componente']."'";
        $result = mysqli_query($conexion, $sql);

        if($detalle = $result->fetch_array()){
            return true;
        }

        return false;
    }

    function actualizaDetalle($conexion){
        $sql = "SELECT * FROM detalles_carrito WHERE id_cliente = '".$_SESSION['id']."' AND id_componente = '".$_POST['id_componente']."'";
        $result = mysqli_query($conexion, $sql);
        $detalle = $result->fetch_array();
        $cantidad = $detalle['cantidad'] + $_POST['cantidad'];

        $sql = "UPDATE detalles_carrito SET cantidad = '".$cantidad."' 
                WHERE id_cliente = '".$_SESSION['id']."' AND id_componente = '".$_POST['id_componente']."'";
        $result = mysqli_query($conexion, $sql);
    }
?>