<?php
  session_start();
?>
<html>
<head>
  <meta charset="UTF-8">
  <title>Pagina de inicio</title>
  <link type="text/css" rel="stylesheet" href="../estilos/estilo.css"/>
</head>
<body>
  <div class="bmenu">
    <a href="#default" class="logo"><img src="../imagenes/logoSamplePrueba.png" height="40" width="40"/></a>
      <div class="btnderecha">
        <a class="active" href="inicio.html">Inicio</a>
        <a href="busqueda.html">Buscar</a>
        <a href="crearEvento.html">Crear Evento</a>
        <a href="cuenta.html">Cuenta</a>
      </div>
  </div>

  <div class="infoUser">
    <?php
      if($_SESSION['sesion']==true){
        echo "<h1 id='nombreUsuario'>$_SESSION[usernameLogIn]</h1>";
      }else if($_SESSION['logged']==false){
        echo 'adios';
      }
    ?>
  </div>

  <div class="eventos">
    <h1>Lista de eventos</h1>

      <?php
      $host_db = "localhost";
      $usuario_db = "root";
      $pass_db = "Monitor?2";
      $nombre_db = "database";


      $conexion_db = new mysqli($host_db, $usuario_db, $pass_db, $nombre_db);

      if(!$conexion_db){
        die("La conexion con la base de datos fallo");
      }
      $buscaEventos= "SELECT * FROM eventos";
      $ejecutarQuery = $conexion_db->query($buscaEventos);
      $cuentaEventos = mysqli_num_rows($ejecutarQuery);

      if($cuentaEventos > 0){
        while($evento = $ejecutarQuery->fetch_array()){
          echo "<div class='evento'>
            <h3 id='nombre'>$evento[1]</h3>
            <p id='fecha'>De $evento[3] a $evento[2]</p>
            <p id='localidad'>En $evento[7], $evento[6]</p>
            <p id='precio'>$evento[8] €</p>
            <button id='seguir'>+</button><br/></div>";
        }
      }
      ?>

  </div>

  <div class="eventosCercanos">
    <h1>lista de eventos cercanos</h1>
  </div>

  <footer>
    <p id="derechos">Derechos reservados por la compañia. Copyrigth &copy; 2017-2018. </p>
    <p id="gmail">Para contactar con nosotros:
      <a href="elproyecto@gmail.com">elproyecto@gmail.com</a>.</p>
    </p>
  </footer>

  </body>
</html>
