<?php
    session_start(); //codigo para iniciar sesion
    //session_destroy(); //codigo para destruir la sesion
    include '../conexion.php';  //esto es para conectar con la base de datos
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">  <!-- Esto permite que se puedan escribir letras como la Ñ-->
	<title>Lista de Usuarios</title> <!-- titulo que aparecerá en la pestaña-->
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
			<tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr>
		</table>
	</td>

	<!-- FIN DE LA COLUMNA DE OPCIONES -->
	
	<!--=====================================
	COLUMNA CON TABLA DE CONTENIDO
	======================================-->
	
	<td width="100%"> <!-- tamaño horizontal de la columna-->
	
		<!--======================
		=          LISTA DE USUARIOS              =
		=======================-->
	
		ADMINISTRADORES
		<table bgcolor="#EAECF7" border="1px">
			<tr bgcolor="#D8CBF8">
				<!--<th>ID</th> -->
				<th>ID</th>
				<th>CORREO</th>
				<th>NOMBRE</th>
				<th>APELLIDO</th>
				<th>CEDULA</th>
				<th>GENERO</th>
				<th>LUGAR NACIMIENTO</th>
				<th>FECHA NACIMIENTO</th>
				<th>TELEFONO</th>
				<th>DIRECCION</th>
				<th>CARGO</th>
				<th colspan="2">OPCIONES</th>
				
			</tr>

			<?php

				$sql="SELECT * FROM admin"; //seleccionar todo lo que hay en "oferta" en base de datos
				$resultado = mysqli_query($conexion, $sql); //se guardan todos los resultados encontrados

				if(mysqli_num_rows($resultado)==0){
					echo '<tr><td colspan="11"> NO HAY RESULTADOS </td></tr>';
				}
				
				while($datos=mysqli_fetch_array($resultado)){ //Ciclo While
					//lo siguiente se repite hasta que se hayan mostrado todos los resultados

			?>

			<tr>
				<!--  se muestran los datos correspondientes a las columnas  -->
				<!--<td>	<?php //echo $datos['id'] ?>						</td> -->
				<td>	<?php echo $datos['idAdmin'] ?>			</td>
				<td>	<?php echo $datos['correo'] ?>			</td>
				<td>	<center><?php echo $datos['nombre'] ?></center>	</td>
				<td>	<?php echo $datos['apellido'] ?>					</td>
				<td>	<?php echo $datos['cedula'] ?>					</td>
				<td>	<?php echo $datos['genero'] ?>					</td>
				<td>	<?php echo $datos['lugarNac'] ?>					</td>
				<td>	<?php echo $datos['fechaNac'] ?>					</td>
				<td>	<?php echo $datos['telefono'] ?>					</td>
				<td>	<?php echo $datos['direccion'] ?>					</td>
				<td>	<?php echo $datos['cargo'] ?>					</td>

				
				<td>	<a href="modificarAdmin.php?idAdmin=<?php echo $datos['idAdmin']; ?>&correo=<?php echo $datos['correo']; ?>">	
							<font color="green">MODIFICAR</font>
						</a>
				</td>
				
				<td>	<a href="eliminarAdmin.php?idAdmin=<?php echo $datos['idAdmin']; ?>&correo=<?php echo $datos['correo']; ?>">			
							<font color="red">ELIMINAR</font>
						</a>
				</td>
				
				
			</tr>
			<?php
				} //fin del ciclo While
			?>
		</table>
<!--====  Fin Lista de usuarios adminitrador ====-->
<BR>
<!--==== Lista de usuarios profesor ====-->
PROFESORES
<table bgcolor="#EAECF7" border="1px">
			<tr bgcolor="#D8CBF8">
				<!--<th>ID</th> -->
				<th>ID</th>
				<th>CORREO</th>
				<th>NOMBRE</th>
				<th>APELLIDO</th>
				<th>CEDULA</th>
				<th>GENERO</th>
				<th>LUGAR NACIMIENTO</th>
				<th>FECHA NACIMIENTO</th>
				<th>TELEFONO</th>
				<th>DIRECCION</th>
				<th>LICENCIATURA</th>
				<th colspan="2">OPCIONES</th>
				
			</tr>

			<?php

				$sql="SELECT * FROM profesor"; //seleccionar todo lo que hay en "oferta" en base de datos
				$resultado = mysqli_query($conexion, $sql); //se guardan todos los resultados encontrados

				if(mysqli_num_rows($resultado)==0){
					echo '<tr><td colspan="11"> NO HAY RESULTADOS </td></tr>';
				}
				
				while($datos=mysqli_fetch_array($resultado)){ //Ciclo While
					//lo siguiente se repite hasta que se hayan mostrado todos los resultados

			?>

			<tr>
				<!--  se muestran los datos correspondientes a las columnas  -->
				<!--<td>	<?php //echo $datos['id'] ?>						</td> -->
				<td>	<?php echo $datos['idProfesor'] ?>			</td>
				<td>	<?php echo $datos['correo'] ?>			</td>
				<td>	<center><?php echo $datos['nombre'] ?></center>	</td>
				<td>	<?php echo $datos['apellido'] ?>					</td>
				<td>	<?php echo $datos['idProfesor'] ?>					</td>
				<td>	<?php echo $datos['genero'] ?>					</td>
				<td>	<?php echo $datos['lugarNac'] ?>					</td>
				<td>	<?php echo $datos['fechaNac'] ?>					</td>
				<td>	<?php echo $datos['telefono'] ?>					</td>
				<td>	<?php echo $datos['direccion'] ?>					</td>
				<td>	<?php echo $datos['licenciatura'] ?>					</td>

				
				<td>	<a href="modificarProfesor.php?idProfesor=<?php echo $datos['idProfesor']; ?>&correo=<?php echo $datos['correo']; ?>">	
							<font color="green">MODIFICAR</font>
						</a>
				</td>
				
				<td>	<a href="eliminarProfesor.php?idProfesor=<?php echo $datos['idProfesor']; ?>&correo=<?php echo $datos['correo']; ?>">		
							<font color="red">ELIMINAR</font>
						</a>
				</td>
				
				
			</tr>
			<?php
				} //fin del ciclo While
			?>
		</table>

<!--=== Fin de lista de usuarios de profesor ===-->
<br>

<!--=== Lista de usuarios de alumnos ===-->
ESTUDIANTES
<table bgcolor="#EAECF7" border="1px">
			<tr bgcolor="#D8CBF8">
				<!--<th>ID</th> -->
				<th>ID</th>
				<th>CORREO</th>
				<th>NOMBRE</th>
				<th>APELLIDO</th>
				<th>DOCUMENTO</th>
				<th>GENERO</th>
				<th>LUGAR NACIMIENTO</th>
				<th>FECHA NACIMIENTO</th>
				<th>TELEFONO</th>
				<th>DIRECCION</th>
				<th>GRADO</th>
				<th colspan="2">OPCIONES</th>
				
			</tr>

			<?php

				$sql="SELECT * FROM estudiante"; //seleccionar todo lo que hay en "oferta" en base de datos
				$resultado = mysqli_query($conexion, $sql); //se guardan todos los resultados encontrados

				if(mysqli_num_rows($resultado)==0){
					echo '<tr><td colspan="11"> NO HAY RESULTADOS </td></tr>';
				}
				
				while($datos=mysqli_fetch_array($resultado)){ //Ciclo While
					//lo siguiente se repite hasta que se hayan mostrado todos los resultados

			?>

			<tr>
				<!--  se muestran los datos correspondientes a las columnas  -->
				<!--<td>	<?php //echo $datos['id'] ?>						</td> -->
				<td>	<?php echo $datos['idAlumno'] ?>			</td>
				<td>	<?php echo $datos['correo'] ?>			</td>
				<td>	<center><?php echo $datos['nombre'] ?></center>	</td>
				<td>	<?php echo $datos['apellido'] ?>					</td>
				<td>	<?php echo $datos['idAlumno'] ?>					</td>
				<td>	<?php echo $datos['genero'] ?>					</td>
				<td>	<?php echo $datos['lugarNac'] ?>					</td>
				<td>	<?php echo $datos['fechaNac'] ?>					</td>
				<td>	<?php echo $datos['telefono'] ?>					</td>
				<td>	<?php echo $datos['direccion'] ?>					</td>
				<td>	<?php echo $datos['grado'] ?>					</td>

				
				<td>	<a href="modificarAlumno.php?idAlumno=<?php echo $datos['idAlumno']; ?>&correo=<?php echo $datos['correo']; ?>">	
							<font color="green">MODIFICAR</font>
						</a>
				</td>
				
				<td>	<a href="eliminarAlumno.php?idAlumno=<?php echo $datos['idAlumno']; ?>&correo=<?php echo $datos['correo']; ?>">		
							<font color="red">ELIMINAR</font>
						</a>
				</td>
				
				
			</tr>
			<?php
				} //fin del ciclo While
			?>
		</table>
		<br><BR>  USUARIOS <BR> <BR>
		ADMINISTRADORES
		<table bgcolor="#EAECF7" border="1px">
			<tr bgcolor="#D8CBF8">
				<!--<th>ID</th> -->
				<th>ID</th>
				<th>CORREO</th>
				<th>PASSWORD</th>
				<th>NOMBRE</th>
				<th>APELLIDO</th>
				
				<th colspan="2">OPCIONES</th>
				
			</tr>

			<?php

				$sql="SELECT * FROM usuarios INNER JOIN admin ON usuarios.correo = admin.correo"; //seleccionar todo lo que hay en "oferta" en base de datos
				$resultado = mysqli_query($conexion, $sql); //se guardan todos los resultados encontrados

				if(mysqli_num_rows($resultado)==0){
					echo '<tr><td colspan="11"> NO HAY RESULTADOS </td></tr>';
				}
				
				while($datos=mysqli_fetch_array($resultado)){ //Ciclo While
					//lo siguiente se repite hasta que se hayan mostrado todos los resultados

			?>

			<tr>
				<!--  se muestran los datos correspondientes a las columnas  -->
				<!--<td>	<?php //echo $datos['id'] ?>						</td> -->
				<td>	<?php echo $datos['idAdmin'] ?>			</td>
				<td>	<?php echo $datos['correo'] ?>			</td>
				<td>	<?php echo $datos['password'] ?>				</td>
				<td>	<center><?php echo $datos['nombre'] ?></center>	</td>
				<td>	<?php echo $datos['apellido'] ?>					</td>
				

				
				<td>	<a href="modificarUsuario.php?idAdmin=<?php echo $datos['idAdmin']; ?>&correo=<?php echo $datos['correo']; ?>">	
							<font color="green">MODIFICAR</font>
						</a>
				</td>
				
				<td>	<a href="eliminarUsuario.php?idAdmin=<?php echo $datos['idAdmin']; ?>&correo=<?php echo $datos['correo']; ?>">		
							<font color="red">ELIMINAR</font>
						</a>
				</td>
				
				
			</tr>
			<?php
				} //fin del ciclo While
			?>
		</table>
<!--====  Fin Lista de usuarios adminitrador ====-->
<BR>
<!--==== Lista de usuarios profesor ====-->
PROFESORES
<table bgcolor="#EAECF7" border="1px">
			<tr bgcolor="#D8CBF8">
				<!--<th>ID</th> -->
				<th>ID</th>
				<th>CORREO</th>
				<th>PASSWORD</th>
				<th>NOMBRE</th>
				<th>APELLIDO</th>
				
				<th colspan="2">OPCIONES</th>
				
			</tr>

			<?php

				$sql="SELECT * FROM usuarios INNER JOIN profesor ON usuarios.correo = profesor.correo"; //seleccionar todo lo que hay en "oferta" en base de datos
				$resultado = mysqli_query($conexion, $sql); //se guardan todos los resultados encontrados

				if(mysqli_num_rows($resultado)==0){
					echo '<tr><td colspan="11"> NO HAY RESULTADOS </td></tr>';
				}
				
				while($datos=mysqli_fetch_array($resultado)){ //Ciclo While
					//lo siguiente se repite hasta que se hayan mostrado todos los resultados

			?>

			<tr>
				<!--  se muestran los datos correspondientes a las columnas  -->
				<!--<td>	<?php //echo $datos['id'] ?>						</td> -->
				<td>	<?php echo $datos['idProfesor'] ?>			</td>
				<td>	<?php echo $datos['correo'] ?>			</td>
				<td>	<?php echo $datos['password'] ?>				</td>
				<td>	<center><?php echo $datos['nombre'] ?></center>	</td>
				<td>	<?php echo $datos['apellido'] ?>					</td>
				

				
				<td>	<a href="modificarUsuario.php?idProfesor=<?php echo $datos['idProfesor']; ?>&correo=<?php echo $datos['correo']; ?>">	
							<font color="green">MODIFICAR</font>
						</a>
				</td>
				
				<td>	<a href="eliminarUsuario.php?idProfesor=<?php echo $datos['idProfesor']; ?>&correo=<?php echo $datos['correo']; ?>">		
							<font color="red">ELIMINAR</font>
						</a>
				</td>
				
				
			</tr>
			<?php
				} //fin del ciclo While
			?>
		</table>

<!--=== Fin de lista de usuarios de profesor ===-->
<br>

<!--=== Lista de usuarios de alumnos ===-->
ESTUDIANTES
<table bgcolor="#EAECF7" border="1px">
			<tr bgcolor="#D8CBF8">
				<!--<th>ID</th> -->
				<th>ID</th>
				<th>CORREO</th>
				<th>PASSWORD</th>
				<th>NOMBRE</th>
				<th>APELLIDO</th>
				
				<th colspan="2">OPCIONES</th>
				
			</tr>

			<?php

				$sql="SELECT * FROM usuarios INNER JOIN estudiante ON usuarios.correo = estudiante.correo"; //seleccionar todo lo que hay en "oferta" en base de datos
				$resultado = mysqli_query($conexion, $sql); //se guardan todos los resultados encontrados

				if(mysqli_num_rows($resultado)==0){
					echo '<tr><td colspan="11"> NO HAY RESULTADOS </td></tr>';
				}
				
				while($datos=mysqli_fetch_array($resultado)){ //Ciclo While
					//lo siguiente se repite hasta que se hayan mostrado todos los resultados

			?>

			<tr>
				<!--  se muestran los datos correspondientes a las columnas  -->
				<!--<td>	<?php //echo $datos['id'] ?>						</td> -->
				<td>	<?php echo $datos['idAlumno'] ?>			</td>
				<td>	<?php echo $datos['correo'] ?>			</td>
				<td>	<?php echo $datos['password'] ?>				</td>
				<td>	<center><?php echo $datos['nombre'] ?></center>	</td>
				<td>	<?php echo $datos['apellido'] ?>					</td>
				

				
				<td>	<a href="modificarUsuario.php?idAlumno=<?php echo $datos['idAlumno']; ?>&correo=<?php echo $datos['correo']; ?>">	
							<font color="green">MODIFICAR</font>
						</a>
				</td>
				
				<td>	<a href="eliminarUsuario.php?idAlumno=<?php echo $datos['idAlumno']; ?>&correo=<?php echo $datos['correo']; ?>">		
							<font color="red">ELIMINAR</font>
						</a>
				</td>
				
				
			</tr>
			<?php
				} //fin del ciclo While
			?>
		</table>


	</td>
	<!--====  FIN DE COLUMNA DE CONTENIDO  ====-->
	</tr>
</table>
<!--====  FIN DE LA TABLA DEL CUERPO  ====-->
</body>
</html>