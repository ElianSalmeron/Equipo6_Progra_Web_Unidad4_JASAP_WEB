<?php 
    include_once("conexion.php");
    $proveedor = $_POST['proveedor'];
    $html = '';

    $sql = "SELECT * FROM componentes WHERE nombre LIKE '%".$proveedor."%'";
    $result = mysqli_query($conexion,$sql);

    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $html .= '<option>'.utf8_encode($row['nombre']).'</option>';
        }
    }

    echo $html;
?>  