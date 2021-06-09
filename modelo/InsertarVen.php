<?php 
    session_start();
    include_once("conexion.php");
    include_once("../dompdf/autoload.inc.php");
    use Dompdf\Dompdf;

    $fecha_array = getdate();
    $fecha = $fecha_array["year"]."-".$fecha_array["mon"]."-".$fecha_array["mday"]." ".$fecha_array["hours"].":".$fecha_array["minutes"].":".$fecha_array["seconds"];
    
    $sql = "SELECT MAX(id_venta) AS id FROM ventas";
    $result = mysqli_query($conexion, $sql);
    $numRegistros = $result->num_rows;

    if($numRegistros > 0){
        $venta = $result->fetch_array();
        $id_venta = $venta['id'] + 1;
    }
    else
        $id_venta = 1;

    /*$sql = "INSERT INTO ventas VALUES (default,'".$_SESSION["id"]."','".$fecha."','".$_SESSION["monto_total"]."')";*/
    $sql = "INSERT INTO ventas VALUES ('".$id_venta."','".$_SESSION["id"]."','".$fecha."','".$_SESSION["monto_total"]."')";
    $result = mysqli_query($conexion, $sql);

    /*$sql = "SELECT * FROM ventas WHERE fecha = '".$fecha."'";
    $result = mysqli_query($conexion, $sql);
    $venta = $result->fetch_array();
    $id_venta = $venta['id_venta'];*/

    for($i=0; $i<count($_SESSION["venta"]); $i++){
        $sql = "INSERT INTO detalles_ventas VALUES ('".$id_venta."','".$_SESSION["venta"][$i][4]."','".$_SESSION["venta"][$i][1]."')";
        $result = mysqli_query($conexion, $sql);

        $existencias = $_SESSION["venta"][$i][5] - $_SESSION["venta"][$i][1];
        $sql = "UPDATE componentes SET existencias = '".$existencias."' WHERE id_componente = '".$_SESSION["venta"][$i][4]."'";
        $result = mysqli_query($conexion, $sql);
    }


    if($result!=null){
        $pdf = new Dompdf();
        ob_start();
        include_once ("../comprobante.php");
        $html = ob_get_clean();
        $pdf->loadHtml($html);
        $pdf->setPaper(array(0, 0, 170.078, 255.118));
        $pdf->render();
    
        $_SESSION["monto_total"] = 0;
        $_SESSION["venta"] = array();
        $pdf->stream("Venta_".$id_venta);

        header('location: ../gestionVen.php');
    }
?>