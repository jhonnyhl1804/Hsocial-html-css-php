<?php
  session_start();
  include '../conexion.php';


?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Imprimir</title>
  <link rel="stylesheet" type="text/css" href="../css/estilos.css">
</head>
<body>
  <input type="button" value="Imprimir" onClick="window.print()">
  <a href="informes.php"><input type="button" value="Regresar"></a>
  <center><table class="tg" style="undefined;table-layout: fixed; width: 621px">
<colgroup>
<col style="width: 175px">
<col style="width: 183px">
<col style="width: 101px">
<col style="width: 162px">
</colgroup>
  <tr>
    <th class="tg-fv77" colspan="4"><span style="font-weight:bold">INSTITUCIÓN EDUCATIVA TÉCNICA PIO XII</span><br><br>Coveñas - Sucre <br> <img src="../img/escudo.jpg" height="100px"> <br> FORMATO CONTROL SERVICIO SOCIAL<br></th>
  </tr>
  <tr>
    <td class="tg-c3ow">NOMBRES<br> <br> <?php echo $_SESSION['nombre'];?></td>
    <td class="tg-c3ow">APELLIDOS<br> <br> <?php echo $_SESSION['apellido'];?></td>
    <td class="tg-c3ow" colspan="2">DOCUMENTO DE IDENTIDAD<br> <br> <?php echo $_SESSION['id'];?></td>
  </tr>
  <tr>
    <td class="tg-c3ow">FECHA DE INICIO<br><br><br> </td>
    <td class="tg-c3ow">FECHA DE TERMINACIÓN<br><br><br></td>
    <td class="tg-c3ow"><br>Total</td>
    <td class="tg-c3ow"><br>80 Horas<br></td>
  </tr>
  <tr>
    <td class="tg-c3ow">LUGAR<br><br><br></td>
    <td class="tg-c3ow" colspan="3">NOMBRE Y APELLIDO DE LA PERSONA QUE SUPERVISA<br><br><br></td>
  </tr>
  <tr>
    <td class="tg-0pky" colspan="4">DIAS:    Lunes___  Martes___  Miércoles___  Jueves___  Viernes___ Sábado___<br></td>
  </tr>
  <tr>
    <td class="tg-c3ow">FECHA<br></td>
    <td class="tg-c3ow">ACTIVIDAD</td>
    <td class="tg-c3ow">NUMERO DE HORAS<br></td>
    <td class="tg-c3ow">FIRMA DE QUIEN COORDINA<br></td>
  </tr>

  <?php

        $sql="SELECT * FROM detalleoferta INNER JOIN oferta ON detalleoferta.idActividad = oferta.idActividad INNER JOIN profesor ON oferta.idProfesor = profesor.idProfesor WHERE idAlumno='$_SESSION[id]' AND detalleoferta.realizado = 1"; //seleccionar todo lo que hay en "oferta" en base de datos
        $resultado = mysqli_query($conexion, $sql); //se guardan todos los resultados encontrados

        if(mysqli_num_rows($resultado)==0){
          echo '<tr><td colspan="11"> NO HAY RESULTADOS </td></tr>';
        }
        $i=0;
        $horas=0;
        while($datos=mysqli_fetch_array($resultado)){ //Ciclo While
          $i=$i+1;
          //lo siguiente se repite hasta que se hayan mostrado todos los resultados

      ?>
      <tr>
        
        <td>  <?php echo $datos['fecha'] ?>         </td>        
        <td>  <?php echo $datos['nombreActividad'] ?>     </td>
        <td>  <center><?php echo $datos['horasCant']; ?></center> </td>
        <td></td>
        
      </tr>
      <?php
        $horas = $horas + $datos['horasCant'];
        } //fin del ciclo While
      ?>
      <tr>
        <td colspan="4"> <br><br> ______________________________ &nbsp &nbsp _____________________________<br> 
          <font size="2px">COORDINADOR DEL PROYECTO &nbsp &nbsp &nbsp SUPERVISOR DEL PROYECTO <BR> <BR> 
        </td>
      </tr>
</table>
</body>
</html>
