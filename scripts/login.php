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
 $contrasena = hash('sha512',$_POST['passLogIn']);

 $buscaUsuario = "SELECT * FROM usuarios WHERE nick = '$nickname' AND SHA2('password',512) = $contrasena";
 $ejecutarQuery = $conexion_db->query($buscaUsuario);
 $contarCoincidencias = mysqli_num_rows($ejecutarQuery);

 if($contarCoincidencias == 1){

    $_SESSION['loggedin'] = true;
    $_SESSION['username'] = $nickname;
    $_SESSION['start'] = time();
    print "Bienvenido! " . $_SESSION['username'];
    header("Location: ../paginas/inicio.html");

  }else{
    header("Location: ../index.html");
    print "Usuario o contraseña incorrectos";
  }
  mysqli_close($conexion_db);
  ?>
