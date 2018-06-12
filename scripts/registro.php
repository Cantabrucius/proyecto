<?php
$host_db = "localhost";
$usuario_db = "root";
$pass_db = "Monitor?2";
$nombre_db = "database";

$nickname = $_POST['username'];
$contrasena = $_POST['password'];
$confirm = $_POST['confirmPass'];
$email = $_POST['email'];
$conexion_db = new mysqli($host_db, $usuario_db, $pass_db, $nombre_db);

if(!$conexion_db){
  die("La conexion con la base de datos fallo");
}

$selectUsuarios = "SELECT * FROM usuarios WHERE nick ='$nickname'";
$ejecutarQuery = $conexion_db->query($selectUsuarios);
$contarCoincidencias = mysqli_num_rows($contarCoincidencias);

if($contarCoincidencias == 1){
  echo "<br/>El nombre de usuario ya existe. <br/>";
  header("Location: ../index.html");
}else if($confirm != $contrasena){
  echo "<br/>Las contraseñas no coinciden. <br/>";
  header("Location: ../index.html");
}else{
  $encriptarPass = hash('sha512', $contrasena);
  $nuevoUsuario = "INSERT INTO usuarios(nick, email, Password) VALUES('$nickname','$email', '$encriptarPass')";
  if($conexion_db->query($nuevoUsuario) === TRUE){
    echo "<br/> El usuario ha sido creado <br/>";
    header("Location: ../index.html");
  }else{
    echo "<br/> Error al crear el usuario. <br/>";
    header("Location: ../index.html");
  }
}

mysqli_close($conexion_db);
