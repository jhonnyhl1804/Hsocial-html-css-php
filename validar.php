<?php
     session_start();
?>


<html>
     <head><title>Validando...</title></head>

     <body>
          <?php //Aqui se valida si el usuario existe
               
               include 'conexion.php';

               $correo = $_POST['correo']; //se recibe el nombre de usuario y se convierte en la variable $nombre
               $password = $_POST['password'];
               $rol = $_POST['rol']; //se recibe el tipo de usuario y se convierte en la variable $rol
               
               
               $consulta="SELECT * FROM usuarios WHERE correo='$correo' AND password='$password'"; 
               //se busca en la tabla usuarios donde la columna "nombre" sea igual a la variable $nombre y al mismo tiempo en la columna password esté el mismo dato que hay en la variable $password
               
               $resultado=mysqli_query($conexion, $consulta); 
               //se hace una consulta conectando a la base de datos ($conexion) y escribiendo la consulta dada en la variable $consulta

               $filas=mysqli_num_rows($resultado); 
               //si hay datos que coinciden con la consulta, se recibiran los datos en la variable $filas          

               if ($filas>0){ //si existe alguna coincidencia (si hay mas de 0 coincidencias)

                    
                    if($rol=="profesor"||($rol=="Profesor")||($rol=="docente")||($rol=="Docente")){

                         $sql="SELECT * FROM usuarios INNER JOIN profesor ON usuarios.correo = profesor.correo WHERE usuarios.correo = '$correo'";
                         
                         $resultado2=mysqli_query($conexion, $sql);
                         $datos=mysqli_fetch_assoc($resultado2); //Se almacenan todo los datos del resultado

                         $_SESSION['nombre']=$datos['nombre'];//se crea una variable de sesion de nombre, que guarde el nombre del usuario
                         $_SESSION['id']=$datos['idProfesor']; //se crea una variable de sesion de id, que guarde el id del usuario
                         $_SESSION['apellido']=$datos['apellido'];

                         header("location: bienvenido.php"); //se redireccionará a la pagina bienvenido.php
                    }


                    elseif ($rol=="alumno"||($rol=="Alumno")||($rol=="estudiante")||($rol=="Estudiante")) {


                         $sql="SELECT * FROM usuarios INNER JOIN estudiante ON usuarios.correo = estudiante.correo WHERE usuarios.correo = '$correo'";

                         $resultado2=mysqli_query($conexion, $sql);
                         $datos=mysqli_fetch_assoc($resultado2); //Se almacenan todo los datos del resultado

                         $_SESSION['nombre']=$datos['nombre'];//se crea una variable de sesion de nombre, que guarde el nombre del usuario
                         $_SESSION['apellido']=$datos['apellido'];
                         $_SESSION['id']=$datos['idAlumno']; //se crea una variable de sesion de id, que guarde el id del usuario

                         header("location: alumno/bienvenido.php");
                    }


                    elseif (($rol=="admin")||($rol=="administrador")||($rol=="Administrador")||($rol=="Admin")) {


                         $sql="SELECT * FROM usuarios INNER JOIN admin ON usuarios.correo = admin.correo WHERE usuarios.correo = '$correo'";

                         $resultado2=mysqli_query($conexion, $sql);
                         $datos=mysqli_fetch_assoc($resultado2); //Se almacenan todo los datos del resultado

                         $_SESSION['nombre']=$datos['nombre'];//se crea una variable de sesion de nombre, que guarde el nombre del usuario
                         $_SESSION['apellido']=$datos['apellido'];
                         $_SESSION['id']=$datos['idAdmin']; //se crea una variable de sesion de id, que guarde el id del usuario

                         header("location: admin/bienvenido.php");
                    }
                    else{
                         echo "<h1> Error en los datos ingresados </h1>";
                    }
                    
               }
               else {
                    echo " <h1> Error en los datos ingresados </h1>";
               }

               mysqli_free_result($resultado);  //se borran lo que hay en $resultado
               mysqli_close($conexion); //se borra lo que hay en $conexion para limpiar la memoria del computador
          ?>
     </body>
</html>
