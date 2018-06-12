<?php
$host_db = "localhost";
$usuario_db = "root";
$pass_db = "Monitor?2";
$nombre_db = "database";

$conexion_db = new mysqli($host_db, $usuario_db, $pass_db, $nombre_db);

if(!$conexion_db){
  die("La conexion con la base de datos fallo");
}

$selectUsuarios = "SELECT * FROM usuarios WHERE nickname = '$_POST[username]'";
$ejecutarQuery = $conexion_db->query($selectUsuarios);
$contarCoincidencias = mysqli_num_rows($contarCoincidencias);

if($contarCoincidencias == 1){
  echo "<br/>El nombre de usuario ya existe. <br/>"
}else if($_POST['password'] != $_POST['confirmPass']){
  echo "<br/>Las contraseñas no coinciden. <br/>"
}else{
  $encriptarPass = hash('sha512', $_POST['password'])
  $nuevoUsuario = "INSERT INTO usuarios(nickname, email, Password) VALUES('$_POST[username]','$_POST[email]', '$encriptarPass')";
  if($conexion_db->query($nuevoUsuario) === TRUE){
    echo "<br/> El usuario ha sido creado <br/>";
  }else{
    echo "<br/> Error al crear el usuario. <br/>"
  }


}
