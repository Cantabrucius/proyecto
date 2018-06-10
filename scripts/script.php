<?php
/**
 * Created by PhpStorm.
 * User: fran2
 * Date: 04/06/2018
 * Time: 12:57
 */

$HOST_DATABASE = "localhost";
$USERNAME_DATABASE = "root";
$PASSWORD_DATABASE = "Monitor?2";
$DATABASE_NAME = "database";



$CONNECTION_DATABASE = new mysqli($db_host, $db_username, $db_password, $db_database);

if(!$CONNECTION_DATABASE){
    print "No se ha conectado a la base de datos";
}else{
    print "Conexión completada";
}

$table_database = "usuarios";
function register($table_database, $form_data){

  $form_data = array();
  $form_data['username'] = $_POST['nombre'];
  $form_data['nickname'] = $_POST['nick'];
  $form_data['email'] = $_POST['email'];
  $form_data['password'] = $_POST['password'];
  $form_data['confirmPass'] = $_POST['confirmPass'];

  $password_encrypted = hash('sha512', $form_data['password']);
  if($form_data['password'] == $form_data['confirmPass']){
    $dbInsertUser = $CONNECTION_DATABASE->query("INSERT INTO $table_database(nombre, nick, Password, email) VALUES('$form_data[username]', '$form_data[nickname]', '$password_encrypted', '$form_data[email]')");
    if($dbInsertUser === TRUE){
      echo "<p>El registro se ha completado</p>";
    }else{
      echo "<p>Hubo un problema con el registro</p>";
    }
  }
}

function logIn($table_database, $logIn_data){
  $logIn_data['nicknameLogIn'] = $_POST['nickLog'];
  $logIn_data['passwordLogIn'] = $_POST['passLog'];
  $password_encrypted = hash('sha512', $logIn_data['passwordLogIn']);

  $dbCheckLogIn = $CONNECTION_DATABASE->query("SELECT nick FROM usuarios WHERE nick = '$logIn_data[nicknameLogIn]' and Password = '$password_encrypted'");
  $countLogIn = mysqli_num_rows($dbCheckLogIn);

  if($countLogIn == 1){
    $_SESSION['user'] = $logIn_data['nicknameLogIn'];
    session_start();
    print "Bienvenido";
  }else{
    print "Has introducido mal los datos";
  }
}

function editProfile(){
  
}

function showProfileInfo(){

}

function showEventInfo(){

}

function logOut(){

}

function followEvent(){

}

function showUserInfo(){

}

function searchEvent(){

}

function createEvent(){

}
?>
