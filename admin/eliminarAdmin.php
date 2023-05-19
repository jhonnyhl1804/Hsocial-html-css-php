<?php 
$idAdmin=$_GET['idAdmin'];
$correo=$_GET['correo'];

require('../conexion.php');

$sql="DELETE FROM admin WHERE idAdmin='$idAdmin' ";
$sql2="DELETE FROM usuarios WHERE correo='$correo'";
$resultado = mysqli_query($conexion, $sql);
$resultado2= mysqli_query($conexion, $sql2);

 if(($resultado)&&($resultado2))
  echo "<center>Usuario Eliminado...</center>";
else
  echo "<center>No Se Puede Eliminar el registro</center>";
?>

<a href="listaUsuarios.php"> Regresar </a>