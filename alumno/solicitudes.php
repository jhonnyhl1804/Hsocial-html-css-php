<?php
    session_start(); //codigo para iniciar sesion
    //session_destroy(); //codigo para destruir la sesion
    include '../conexion.php';  //esto es para conectar con la base de datos
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">  <!-- Esto permite que se puedan escribir letras como la Ñ-->
	<title>Solicitudes</title> <!-- titulo que aparecerá en la pestaña-->
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
					<a href="bienvenido.php"><center><h1>MENÚ</h1></center></a>

				</td>
			</tr>

			<tr>
				<td>
					<a href="listaOfertas.php" style="text-decoration:none"> <font color="white"> <h2>Ver Ofertas</h2> </font></a>
				</td>
			</tr>
			<tr>
				<td>
					<a href="solicitudes.php" style="text-decoration:none"> <font color="white"> <h2>Mis Solicitudes</h2> </font></a>
				</td>
			</tr>
			<tr>
				<td>
					<a href="informes.php" style="text-decoration:none"> <font color="white"> <h2>Informes</h2></font> </a>
				</td>
			</tr>
			<tr>
				<td>
					<a href="../index.php" style="text-decoration:none"> <font color="#E0DBDB"> <h3>Cerrar Sesión</h3></font> </a>
				</td>
			</tr>
		</table>
	</td>

	<!-- FIN DE LA COLUMNA DE OPCIONES -->
	
	<!--=====================================
	COLUMNA CON TABLA DE CONTENIDO
	======================================-->
	
	<td width="100%"> <!-- tamaño horizontal de la columna-->
	
	
		<!--======================
		=          LISTA DE SOLICITUDES              =
		=======================-->
	
		
		<table bgcolor="#EAECF7" border="1px">
			<tr bgcolor="#D8CBF8">
				<!--<th>ID</th> -->
				<th>TIPO ACTIVIDAD</th>
				<th>NOMBRE ACTIVIDAD</th>
				<th>NOMBRE PROFESOR</th>
				<th>DESCRIPCION</th>
				<th>No. HORAS</th>				
				<th>FECHA</th>
				<th>HORA</th>
				<th>LUGAR</th>
				<th>OPCIONES</th>
				
			</tr>

			<?php

				$sql="SELECT * FROM detalleoferta WHERE idAlumno='$_SESSION[id]' AND realizado='0'"; //seleccionar todo lo que hay en "oferta" en base de datos
				$resultado = mysqli_query($conexion, $sql); //se guardan todos los resultados encontrados

				if(mysqli_num_rows($resultado)==0){
					echo '<tr><td colspan="11"> NO HAY RESULTADOS </td></tr>';
				}

				while($datos=mysqli_fetch_array($resultado)){ //Ciclo While
					//lo siguiente se repite hasta que se hayan mostrado todos los resultados
					$sql2="SELECT * FROM oferta WHERE idActividad='$datos[idActividad]'";
					$resultado2 = mysqli_query($conexion, $sql2);
					
					while ($datos2=mysqli_fetch_array($resultado2)) {
											
			?>

			<tr>
				<!--  se muestran los datos correspondientes a las columnas  -->
				<!--<td>	<?php //echo $datos['id'] ?>						</td> -->
				<td>	<?php echo $datos2['tipoActividad'] ?>			</td>
				<td>	<?php echo $datos2['nombreActividad'] ?>			</td>
				<td>	
					<?php 
						$consultaSQL="SELECT nombre,apellido FROM oferta INNER JOIN profesor ON profesor.idProfesor = oferta.idProfesor";
						$resultadoConsulta=mysqli_query($conexion, $consultaSQL);
                        $datosConsulta=mysqli_fetch_assoc($resultadoConsulta);
                        echo $datosConsulta['nombre'],' ';
                        echo $datosConsulta['apellido'];
					?>			
				</td>
				<td>	<?php echo $datos2['descripcion'] ?>				</td>
				<td>	<center><?php echo $datos2['horasCant'] ?></center>	</td>
				<td>	<?php echo $datos2['fecha'] ?>					</td>
				<td>	<?php echo $datos2['hora'] ?>					</td>
				<td>	<?php echo $datos2['lugar'] ?>					</td>
				<td>	<a href="listaOfertasCancelar.php?idActividad=<?php echo $datos['idActividad']; ?>&idDetalle=<?php echo $datos['idDetalle'];?>&contador=<?php echo $datos2['contador']?>">	
							<font color="red">CANCELAR</font>
						</a>
				</td>
				
			</tr>
			<?php
					}
				} //fin del ciclo While
			?>
		</table>
<!--====  Fin Lista de ofertas  ====-->


	</td>
	<!--====  FIN DE COLUMNA DE CONTENIDO  ====-->
	</tr>
</table>
<!--====  FIN DE LA TABLA DEL CUERPO  ====-->
</body>
</html>