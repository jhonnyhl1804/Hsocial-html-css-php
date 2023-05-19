<?php 
$correo=$_GET["correo"];
require('../conexion.php');

$sql="DELETE FROM usuarios WHERE correo='$correo' ";
$resultado = mysqli_query($conexion, $sql);
 if($resultado)
  echo "<center>Usuario Eliminado...</center>";
else
  echo "<center>No Se Puede Eliminar el registro</center>";
?>

<a href="listaUsuarios.php"> Regresar </a>