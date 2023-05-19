<?php
    session_start(); //codigo para iniciar sesion
    //session_destroy(); //codigo para destruir la sesion
    include 'conexion.php';  //esto es para conectar con la base de datos
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">  <!-- Esto permite que se puedan escribir letras como la Ñ-->
	<title>Lista de ofertas</title> <!-- titulo que aparecerá en la pestaña-->
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
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
					<a href="actsocial.php" style="text-decoration:none"> <font color="white">  <h2>Crear Oferta</h2> </font></a>
				</td>
			</tr>
			<tr>
				<td>
					<a href="listaOfertasDisponibles.php" style="text-decoration:none"> <font color="white"> <h2>Ofertas Disponibles</h2> </font></a>
				</td>
			</tr>
			<tr>
				<td>
					<a href="listaOfertasCerradas.php" style="text-decoration:none"> <font color="white"> <h2>Ofertas Cerradas</h2> </font></a>
				</td>
			</tr>
			<tr>
				<td>
					<a href="listaOfertas.php" style="text-decoration:none"> <font color="white"> <h2>Todas Mis Ofertas</h2></font> </a>
				</td>
			</tr>
			<tr>
				<td>
					<a href="index.php" style="text-decoration:none"> <font color="#E0DBDB"> <h3>Cerrar Sesión</h3></font> </a>
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
		=          LISTA DE OFERTAS              =
		=======================-->
	
		
		<table bgcolor="#EAECF7" border="1px">
			<tr bgcolor="#D8CBF8">
				<!--<th>ID</th> -->
				<th>TIPO ACTIVIDAD</th>
				<th>NOMBRE ACTIVIDAD</th>
				<th>DESCRIPCION</th>
				<th>No. HORAS</th>
				<th>FECHA</th>
				<th>HORA</th>
				<th>LUGAR</th>
				<th>No. ALUMNOS</th>
				<th>ESTUDIANTES ASIGNADOS</th>
				<th>DISPONIBLE</th>
				<th>REALIZADO</th>
				<th>OPCIONES</th>
				
			</tr>

			<?php

				$sql="SELECT * FROM oferta WHERE idProfesor='$_SESSION[id]'"; //seleccionar todo lo que hay en "oferta" en base de datos
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
				<td>	<?php echo $datos['tipoActividad'] ?>			</td>
				<td>	<?php echo $datos['nombreActividad'] ?>			</td>
				<td>	<?php echo $datos['descripcion'] ?>				</td>
				<td>	<center><?php echo $datos['horasCant'] ?></center>	</td>
				<td>	<?php echo $datos['fecha'] ?>					</td>
				<td>	<?php echo $datos['hora'] ?>					</td>
				<td>	<?php echo $datos['lugar'] ?>					</td>
				<td>	<center><?php echo $datos['alumnosCant'] ?></center></td>
				<td> <?php
						$consultaSQL = "SELECT nombre, apellido FROM estudiante INNER JOIN detalleoferta ON estudiante.idAlumno = detalleoferta.idAlumno WHERE idActividad ='$datos[idActividad]'"; 

						$resultadoConsulta = mysqli_query($conexion, $consultaSQL); 

						if(mysqli_num_rows($resultadoConsulta)==0){
							echo 'Aún no hay alumnos';
						}
				
						while($datosConsulta=mysqli_fetch_array($resultadoConsulta)){
							echo $datosConsulta['nombre'],' ',$datosConsulta['apellido'], '<br> ';
						}
					?> 
				</td>

				<td>	
					<?php 

						if($datos['contador']>0){
							echo 'Disponible';
						} 
						else{
							echo 'Cerrada' ;
						}
						
					?>					
				</td>
				<td>
					<?php
						
						$consultaSQL2 = "SELECT realizado FROM detalleoferta WHERE idActividad ='$datos[idActividad]' LIMIT 1"; 

						$resultadoConsulta2 = mysqli_query($conexion, $consultaSQL2); 

						if(mysqli_num_rows($resultadoConsulta2)==0){
							echo 'No ha sido cerrada';
						}
						else
						{
							while($datosConsulta2=mysqli_fetch_array($resultadoConsulta2))
							{
								if($datosConsulta2['realizado']==1){
									echo "SI";
								} 
								else{
									echo "NO";
								}
							}
						}					
					?>
				</td>
				<td>	
					<?php

						$consultaSQL3 = "SELECT realizado FROM detalleoferta WHERE idActividad ='$datos[idActividad]' LIMIT 1"; 

						$resultadoConsulta3 = mysqli_query($conexion, $consultaSQL3);

						if(mysqli_num_rows($resultadoConsulta3)==0){
							echo 'No ha sido cerrada';
						}
						else
						{
							while($datosConsulta3=mysqli_fetch_array($resultadoConsulta3))
							{
								if($datosConsulta3['realizado']==1){
									echo '<font color="#8B8989">REACTIVAR</font>';
								} 
								else
								{
								
					?>
									<a href="listaOfertasReactivar.php?idActividad=<?php echo $datos['idActividad']; ?>&alumnosCant=<?php echo $datos['alumnosCant'] ?>">	
										<font color="green">REACTIVAR</font>
									</a>	
					<?php
								}
							}
						}	
					?>
					
				</td>
				
			</tr>
			<?php
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