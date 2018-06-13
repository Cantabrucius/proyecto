<?php
session_start();
?>

 <?php
 $host_db = "localhost";
 $usuario_db = "root";
 $pass_db = "Monitor?2";
 $nombre_db = "database";


 $conexion_db = new mysqli($host_db, $usuario_db, $pass_db, $nombre_db);

 if(!$conexion_db){
   die("La conexion con la base de datos fallo");
 }
 $username = $_POST['usernameLogIn'];
 $passwordLogIn_db_hashed = hash('sha512', $_POST['passLogIn']);
 $pass = substr($passwordLogIn_db_hashed, 0, 12);

 $buscarUsuario = "SELECT * FROM usuarios WHERE nick = '$username' AND password = '$pass'";
 $ejecutarQuery = $conexion_db->query($buscarUsuario);

 if(mysqli_num_rows($ejecutarQuery) == 1){
   $_SESSION['sesion'] = true;
   $_SESSION['usernameLogIn'] = $_POST['usernameLogIn'];
   header("Location: ../paginas/inicio.php");
 }else{
   session_close();
   header("Location: ../index.html");
   echo "adios";
 }
  ?>
