<?php 
$idActividad=$_GET["idActividad"];
require('conexion.php');

$sql="DELETE FROM oferta WHERE idActividad='$idActividad' ";
$resultado = mysqli_query($conexion, $sql);
 if($resultado)
  echo "<center>Publicación Eliminada...</center>";
else
  echo "<center>No Se Puede Eliminar el registro</center>";
?>

<a href="listaOfertas.php"> Regresar </a>