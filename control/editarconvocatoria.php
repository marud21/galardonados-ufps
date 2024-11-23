<?php
include 'conexion.php';

$conn = conexion();

if(isset($_POST['enviar'])){

}else{
    $id=$_GET['id'];
    $sql="select * from convocatorias where id='".$id."'";
    $result = mysqli_query($conn, $sql);
 
    $fila=mysqli_fetch_assoc($result);
    
    $nombre=$fila["nombre"];
    $categoria=$fila["categoria"];
    $descripcion=$fila["descripcion"];
    $encargado=$fila["encargado"];
    $fecha_inicio=$fila["fecha_inicio"];
    $fecha_fin=$fila["fecha_fin"];
}

mysql_close($conn);

?>