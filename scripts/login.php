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

 $nickname = $_POST['usernameLogIn'];
 $contrasena = $_POST['passLogIn'];

 $buscaUsuario = "SELECT * FROM usuarios WHERE nick = '$_POST[usernameLogIn]'";
 $ejecutarQuery = $conexion_db->query($buscaUsuario);

 $hashed_password = $ejecutarQuery->fetch_assoc();
 if(password_verify($contrasena,$hashed_password['password'])){
    $_SESSION['loggedin'] = true;
    $_SESSION['username'] = $nickname;
    $_SESSION['start'] = time();
    header("Location: ../paginas/inicio.html");

  }else{
    print "Usuario o contraseña incorrectos";
  }
  mysqli_close($conexion_db);
  ?>
