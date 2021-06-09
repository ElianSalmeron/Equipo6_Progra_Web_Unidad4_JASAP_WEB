<?php 
   include_once("conexion.php");

   $sql = "SELECT MAX(id_componente) AS id FROM componentes";
   $result = mysqli_query($conexion, $sql);
   $numRegistros = $result->num_rows;

   if($numRegistros > 0){
      $componente = $result->fetch_array();
      $id_componente = $componente['id'] + 1; 
   }
   else
      $id_componente = 1;

   $ruta = upload_image();
   $sql = "INSERT INTO componentes VALUES ('".$id_componente."','".$_POST["nombre"]."','".$_POST["categoria"]."','".$_POST["existencias"]."','".$_POST["precio"]."','".$_POST["descripcion"]."','".$ruta."')";
   $result = mysqli_query($conexion, $sql);
      
   if($result!=null)
      header('location: ../agregarComp.php');
?>

<?php 

   function upload_image(){
      $extension = explode(".", $_FILES["imagen"]["name"]);
      $new_name = rand().".".$extension[1];
      $destination = '../Img/'.$new_name;
      move_uploaded_file($_FILES["imagen"]['tmp_name'],$destination);
      return $new_name;
   }

?>