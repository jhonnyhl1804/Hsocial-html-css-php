<?php
    session_start(); //codigo para iniciar sesion
    //session_destroy(); //codigo para destruir la sesion
    include '../conexion.php';  //esto es para conectar con la base de datos
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">  <!-- Esto permite que se puedan escribir letras como la Ñ-->
	<title>Crear Profesor</title> <!-- titulo que aparecerá en la pestaña-->
	<link rel="stylesheet" type="text/css" href="../css/estilos.css">
</head>
<body>
<table id="main"> 
	<tr><td>

		<!--=====================================
		COLUMNA CON TABLA QUE CONTIENE LA BARRA DE OPCIONES
		======================================-->	
		
		<div id="superior"> ¡Hola! <?php echo $_SESSION['nombre']; ?> <?php echo $_SESSION['apellido']; ?> </div>
		<table id="lateral" bgcolor="#007EFF" width="250px" border="1px" bordercolor="#030A9D">
			<tr >
				<td height="300px">
					<center><h1>MENÚ</h1></center>

				</td>
			</tr>
			<tr>
				<td>
					<a href="formUsuarios.php" style="text-decoration:none"> <font color="white">  <h2>Crear Usuario</h2> </font></a>
				</td>
			</tr>
			<tr>
				<td>
					<a href="listaUsuarios.php" style="text-decoration:none"> <font color="white"> <h2>Lista de Usuarios</h2> </font></a>
				</td>
			</tr>
			<tr>
				<td>
					<a href="listaOfertas.php" style="text-decoration:none"> <font color="white"> <h2>Lista de Ofertas</h2> </font></a>
				</td>
			</tr>
			<tr>
				<td>
					<a href="../index.php" style="text-decoration:none"> <font color="#E0DBDB"> <h3>Cerrar Sesión</h3></font> </a>
				</td>
			</tr>
			<tr><td></td></tr><tr><td></td></tr>
		</table>
	</td>

	<!-- FIN DE LA COLUMNA DE OPCIONES -->

	<?php

	//codigo para obtener el último de valor maximo en el id de los usuarios
	$rs=mysqli_query($conexion, "SELECT MAX(idUsuario) AS idUsuario FROM usuarios");
	if ($row = mysqli_fetch_array($rs)) {
		$idUsuario = trim($row[0]+1); //al proximo id se le sumará un número
	
	
		//se ingresan los datos

		if(isset($_POST['crear'])){
			
			$rol = $_POST['rol'];
			$correo = $_POST['correo'];
			$password = $_POST['password'];
			
			$consulta = "SELECT * FROM usuarios WHERE correo ='$correo'";
			//sentencia SQL para ingresar datos nuevos a la base de datos
			$resultadoConsulta = mysqli_query($conexion, $consulta); //se guardan todos los resultados encontrados

			if(mysqli_num_rows($resultadoConsulta)==0){
				$crearUsuario="INSERT INTO usuarios (idUsuario, rol, correo, password) VALUES ('$idUsuario', '$rol', '$correo', '$password')";

				if(mysqli_query($conexion, $crearUsuario)){
					echo "<center> Los datos han sido ingresados correctamente. <br> Usuario Creado</center>";
				} else{
					echo "<center> Ha ocurrido un problema y no se ha podido crear nuevo usuario.";
				}
			}else{ echo "<center> Ya existe un usuario con ese correo"; }
		}
	}
		
	?>
	
	<!--=====================================
	COLUMNA CON TABLA DE CONTENIDO
	======================================-->


	<?php

		
?>			
	
	<td width="100%"> <!-- tamaño horizontal de la columna-->
	
<center>
	<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>"> <!-- metodo con el que se enviarán los datos -->
		<table border="1"> <!-- una tabla para ponerle borde -->
			<tr><td>
				<table >	<!-- tabla para encerrar el formulario -->
					<tr bgcolor="green">
						<td colspan="2"> <!-- cospan hará que el td ocupe dos columnas -->
							<center> <h2> .:Crear Usuario:. </h2> </center>
						</td>
					</tr>
					<tr>
				<td>
					<h3> Tipo de Usuario: </h3>
				</td>
				<td>
					<select style="width:196px" name="rol">
						<option value=""></option>
						<option value="admin">Administrador</option>
						<option value="profesor">Profesor</option>
						<option value="alumno">Alumno</option>
					</select>
				</td>	
			</tr>
			<tr>
				<td>
					<h3> Correo Electrónico: </h3> <!-- etiqueta -->
				</td>
				<?php 
					$sql="SELECT correo FROM profesor";
					$resultado= mysqli_query($conexion, $sql); 
					$lista1 = "";
					while($datos=mysqli_fetch_array($resultado)){
						$lista1 = $lista1."<option value='".$datos['correo']."'>".$datos['correo']."</option>";
					}
					$sql2="SELECT correo FROM estudiante";
					$resultado2= mysqli_query($conexion, $sql2); 
					$lista2 = "";
					while($datos2=mysqli_fetch_array($resultado2)){
						$lista2 = $lista2."<option value='".$datos2['correo']."'>".$datos2['correo']."</option>";
					}
					$sql3="SELECT correo FROM admin";
					$resultado3= mysqli_query($conexion, $sql3); 
					$lista3 = "";
					while($datos3=mysqli_fetch_array($resultado3)){
						$lista3 = $lista3."<option value='".$datos3['correo']."'>".$datos3['correo']."</option>";
					}
					$lista=$lista1.$lista2.$lista3;
				?>
				<td>
					<select style="width:196px" name="correo">
						<?php echo $lista ?> 
					</select>
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
							<center><input type="submit" name="crear" style="font-size: 19px" value="Crear"></center>
						</td>
					</tr>
				</table>
			</td></tr>
		</table>
	</form>	
</center>
	</td>
	<!--====  FIN DE COLUMNA DE CONTENIDO  ====-->
	</tr>
</table>
<!--====  FIN DE LA TABLA DEL CUERPO  ====-->
</body>
</html>