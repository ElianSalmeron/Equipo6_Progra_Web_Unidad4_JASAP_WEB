<?php
    session_start();
    $_SESSION["monto_total_ped"] = 0;
    $_SESSION["pedido"] = array();
    $_SESSION["proveedor"] = "";
    header('location: gestionPed.php');
?>