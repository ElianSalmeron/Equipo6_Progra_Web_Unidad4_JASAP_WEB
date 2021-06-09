<?php
    session_start();
    $_SESSION["monto_total"] = 0;
    $_SESSION["venta"] = array();
    header('location: gestionVen.php');
?>