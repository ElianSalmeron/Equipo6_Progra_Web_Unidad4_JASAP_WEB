<?php  
session_start();
include_once("conexion.php");


if(isset($_POST["cambiar"])){
    $sql="update clientes set tarjeta_predet = (select id_tarjeta from tarjetas where id_tarjeta = '".$_POST["tarjetan"]."')";     
    $result=mysqli_query($conexion, $sql);
}


if(isset($_POST["agregartarjeta"])){
    
    $consulta="Select * from clientes where id_cliente='".$_SESSION["id"]."' ";
 $resultado=mysqli_query($conexion,$consulta);
    $tarjeta = $resultado ->fetch_array()['tarjeta_predet'];
    
if(is_null($tarjeta)){
    
    $sql="INSERT INTO tarjetas VALUES ('".$_POST["numerot"]."','".$_SESSION["id"]."','".$_POST["metodop"]."','".$_POST["titular"]."')";   
    $result=mysqli_query($conexion,$sql); 
            
    $sqla="Update clientes set tarjeta_predet='".$_POST["numerot"]."'";
    $result2=mysqli_query($conexion, $sqla);

    }
    else{
    $sql="INSERT INTO tarjetas VALUES ('".$_POST["numerot"]."','".$_SESSION["id"]."','".$_POST["metodop"]."','".$_POST["titular"]."')";   
    $result=mysqli_query($conexion,$sql); 
        
    }

}

if(isset($_POST["eliminarpago"])){  
//arroja el id
$consulta="select * from clientes where id_cliente='".$_SESSION['id']."'";
$resultado=mysqli_query($conexion, $consulta);
$tarp=$resultado->fetch_array()['tarjeta_predet'];
//tarjeta
$consulta2="select * from tarjetas where id_cliente='".$_SESSION['id']."' and id_tarjeta='".$_POST['tarjetan']."'";
$resultado2=mysqli_query($conexion, $consulta2);
$idt=$resultado2->fetch_array()['id_tarjeta'];
    
if($tarp == $idt){
    $sql="DELETE FROM tarjetas where id_cliente='".$_SESSION["id"]."' and
    id_tarjeta ='".$_POST["tarjetan"]."'";
    $result=mysqli_query($conexion,$sql);

    $cambiar="select * from tarjetas where id_cliente='".$_SESSION['id']."'";
    $result=mysqli_query($conexion, $cambiar);
    $nuevo=$result->fetch_array()['id_tarjeta'];

if(is_null($nuevo)){
    $sqla="update clientes set tarjeta_predet=NULL";
    $result2=mysqli_query($conexion,$sqla);
    
}else{
    $sqla="update clientes set tarjeta_predet=$nuevo";
    $result2=mysqli_query($conexion,$sqla);
}
}
else{
    $sql="DELETE FROM tarjetas where id_cliente='".$_SESSION["id"]."' and
    id_tarjeta ='".$_POST["tarjetan"]."'";
    $result=mysqli_query($conexion,$sql);

}
    
    }
header("location: ../pagos.php");
?>


 
    