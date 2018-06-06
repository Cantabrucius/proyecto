<?php
/**
 * Created by PhpStorm.
 * User: fran2
 * Date: 04/06/2018
 * Time: 12:57
 */

$db_host = "localhost";
$db_username = "root";
$db_password = "Monitor?2";
$db_database = "database";
$db_table = "usuarios";

$form_pass = $_POST['pass'];
$confirm_pass = $_POST['confirmarPass'];

$db_connection = new mysqli($db_host, $db_username, $db_password, $db_database);


if(!$db_connection){
    print "No se ha conectado a la base de datos";
}else{
    print "Conexión completada";
}

$coincidenciaUsuario = "SELECT * FROM $db_table WHERE nick = '$_POST[nick]'";
$resultadoCoincidencia = $db_connection->query($coincidenciaUsuario);
$cuenta = mysqli_num_rows($resultadoCoincidencia);

if($cuenta == 1){
    print "El nombre de usuario ya existe";
}else if($form_pass != $confirm_pass){
    print "La contraseña no coincide";
}else{
    $hash = password_hash($form_pass, PASSWORD_BCRYPT);
    $db_insert = "INSERT INTO usuarios(nombre, apellidos, nick, email, password) VALUES('$_POST[Nombre]', '$_POST[apellido]','$_POST[nick]', '$_POST[email]', '$_POST[pass]')";
    if($db_connection->query($db_insert) === TRUE){
        echo "usuario creado";
    }else{
        echo "error";
    }
}