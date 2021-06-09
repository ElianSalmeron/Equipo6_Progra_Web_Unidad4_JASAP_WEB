<?php  
    session_start();
    include_once("conexion.php");

    if(isset($_POST["cambiar"])){
        $sql = "UPDATE clientes SET direccion_predet = (SELECT id_direccion FROM direcciones WHERE direccion = '".$_POST["direccion"]."')"; 
        $result = mysqli_query($conexion, $sql);
    }


if(isset($_POST["actualizar"])){
$sql="update direcciones set direccion = '".$_POST["actDirec"]."' where id_cliente = '".$_SESSION['id']."' and direccion='".$_POST["direccion"]."'"; 
    
    $result=mysqli_query($conexion, $sql);
    
}
    if(isset($_POST["agregar"])){
        
        $consulta = "SELECT * FROM clientes WHERE id_cliente='".$_SESSION['id']."'";
        $resultado = mysqli_query($conexion, $consulta);
        $dir = $resultado->fetch_array()['direccion_predet'];

        if(is_null($dir)){
            $sql = "INSERT INTO direcciones VALUES (default,'".$_SESSION["id"]."','".$_POST["aDirec"]."')";
             $result = mysqli_query($conexion,$sql);
                
            $sqla = "UPDATE clientes SET direccion_predet=(SELECT id_direccion FROM direcciones WHERE direccion ='".$_POST['aDirec']."')";
            $result2 = mysqli_query($conexion, $sqla);
        }
        else{
            $sql = "INSERT INTO direcciones VALUES (default,'".$_SESSION["id"]."','".$_POST["aDirec"]."')";
            $result = mysqli_query($conexion,$sql);
        }
    }

    if(isset($_POST["eliminar"])){
        //arroja el id
        $consulta = "SELECT * FROM clientes WHERE id_cliente='".$_SESSION['id']."'";
        $resultado = mysqli_query($conexion, $consulta);
        $dirp = $resultado->fetch_array()['direccion_predet'];
        
        //direccion  
        $consulta2 = "SELECT * FROM direcciones WHERE id_cliente='".$_SESSION['id']."' AND direccion='".$_POST["direccion"]."'";
        $resultado2 = mysqli_query($conexion, $consulta2);
        $id = $resultado2->fetch_array()['id_direccion'];
    
        if($id==$dirp){
            $sql = "DELETE FROM direcciones WHERE id_cliente='".$_SESSION["id"]."' AND direccion ='".$_POST["direccion"]."'";
            $result = mysqli_query($conexion,$sql);
            
            $cambiar = "SELECT * FROM direcciones WHERE id_cliente='".$_SESSION['id']."'";
            $result = mysqli_query($conexion,$cambiar);
            $nuevo = $result->fetch_array()['id_direccion'];
            
            if(is_null($nuevo)){
                $sqla = "UPDATE clientes SET direccion_predet = NULL";
                $result2 = mysqli_query($conexion, $sqla);
            }else{
                $sqla = "UPDATE clientes set direccion_predet = $nuevo";
                $result2 = mysqli_query($conexion, $sqla);
            }
        }
        else{
            $sql = "DELETE FROM direcciones where id_cliente='".$_SESSION["id"]."' AND direccion ='".$_POST["direccion"]."'";
            $result = mysqli_query($conexion,$sql);
        }
    }

    header("location: ../segPedido.php");
?>

