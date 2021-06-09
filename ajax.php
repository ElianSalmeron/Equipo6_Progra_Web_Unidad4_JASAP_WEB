<?php 
    include_once("modelo/conexion.php");

    $html = '';
    $key = $_POST['key'];
    $sql = 'SELECT * FROM componentes WHERE nombre LIKE "%'.strip_tags($key).'%"';
    $result = mysqli_query($conexion, $sql); 

    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $html .= '<div><a class="suggest-element" data="'.utf8_encode($row['nombre']).'" id="product'.$row['id_componente'].'">'.utf8_encode($row['nombre']).'</a></div>';
        }
    }

    echo $html;
?>