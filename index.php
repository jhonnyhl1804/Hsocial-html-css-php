<?php
    session_start(); //codigo para iniciar sesion
    session_destroy(); //codigo para destruir la sesion
    include 'conexion.php';  //esto es para conectar con la base de datos
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">  <!-- Esto permite que se puedan escribir letras como la Ñ-->
	<title>Login</title> <!-- titulo que aparecerá en la pestaña-->
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
</head>
<body>
	<br><br>
	<table>
	<td>
	<img src="img/escudo.png">
</td><td>
	<p class="login">PLATAFORMA DE <br> HORAS SOCIALES</p>
</td> </table>
	<form  action="validar.php" method="POST"> <!-- action es donde se van a mandar los datos y POST el metodo -->
<table id="login" border="1"> <!-- una tabla para ponerle borde -->
	<tr>
		<td>
			<table>	<!-- tabla para encerrar el formulario -->
				<tr id="blue">
					<td colspan="2"> <!-- cospan hará que el td ocupe dos columnas -->
						<center><h2> <font color="white"> .:Iniciar Sesión:.</font> </h2></center>
					</td>
				</tr>
				<tr>
					<td>
						<h3> Tipo de Usuario: </h3>
					</td>
					<td>
						<!--<select style="width:196px" name="rol">
							<option value=""></option>
							<option value="admin">Administrador</option>
							<option value="profesor">Profesor</option>
							<option value="alumno">Alumno</option>
						</select>-->
						<input type="text" size="25" name="rol">
					</td>	
				</tr>
				<tr>
					<td>
						<h3> Correo Electrónico: </h3> <!-- etiqueta -->
					</td>
					<td>
						<input type="email" size="25" name="correo"> <!--campo donde se escribe -->
					</td>
				</tr>
				<tr>
					<td>
						<h3> Constraseña: </h3>
					</td>
					<td>
						<input type="password" size="25" name="password"> 
					</td>
				</tr>
				
				<tr>
					<td colspan="2">
						<center><input type="submit" name="login" value="Ingresar"></center>
					</td>
				</tr>		
			</table>
		</td>
	</tr>
</table>
	</form>

</body>
</html>