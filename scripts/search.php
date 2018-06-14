<?php
$host_db = "localhost";
$usuario_db = "root";
$pass_db = "Monitor?2";
$nombre_db = "database";


$conexion_db = new mysqli($host_db, $usuario_db, $pass_db, $nombre_db);

$fecha = "";
$nombre = "";
$ciudad = "";
if(!$conexion_db){
  die("La conexion con la base de datos fallo");
}
if(isset($_POST['buscar'])){
  $fecha = $_POST['bfecha'];
  $nombre = $_POST['bnombre'];
  $ciudad = $_POST['bciudad'];
}else{
  echo "<br/>";
}
$busqueda = "SELECT * FROM eventos WHERE fechainicio LIKE '%$fecha%' AND titulo LIKE '%$nombre% ' AND localidad LIKE '%$ciudad%'";
$ejecutarQuery = $conexion_db->query($busqueda);
$contarFilas = mysqli_num_rows($ejecutarQuery);

if($contarFilas > 0){
  while($eventoBusqueda = $ejecutarQuery->fetch_array()){
    echo "<div class='evento'>
      <h3 id='nombre'>$eventoBusqueda[1]</h3>
      <p id='fecha'>De $eventoBusqueda[3] a $eventoBusqueda[2]</p>
      <p id='localidad'>En $eventoBusqueda[7], $eventoBusqueda[6]</p>
      <p id='precio'>$eventoBusqueda[8] €</p>
      <button id='seguir'>+</button><br/></div>";
  }
}

 ?>
