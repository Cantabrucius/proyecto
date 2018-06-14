<?php
  session_start();
 ?>
<html>
<head>
  <meta charset="UTF-8">
  <title>Crear cuenta</title>
  <link type="text/css" rel="stylesheet" href="../estilos/estilo.css"/>
</head>
<body>
  <div class="bmenu">
    <a href="#default" class="logo">Foto_Logo</a>
    <div class="btnderecha">
    <a class="active" href="inicio.php">Inicio</a>
    <a href="busqueda.php">Buscar</a>
      <a href="crearEvento.php">Crear Evento</a>
    <a href="cuenta.php">Cuenta</a>
    </div>
  </div>

<div class="contenido_cuenta">

<div class="separacion">
    <div class="cuenta">
    <button class="tablinks" onclick="cuenta(event, 'Informacion')" id="defaultOpen">Informacion</button>
    <button class="tablinks" onclick="cuenta(event, 'Editar')">Editar Perfil</button>
    <button class="tablinks" onclick="cuenta(event, 'Outs')">Log Out</button>
    </div>

    <div id="Informacion" class="tabcontent">
      <h1>Informacion</h1>

          <?php
          $host_db = "localhost";
          $usuario_db = "root";
          $pass_db = "Monitor?2";
          $nombre_db = "database";


          $conexion_db = new mysqli($host_db, $usuario_db, $pass_db, $nombre_db);

          if(!$conexion_db){
            die("La conexion con la base de datos fallo");
          }
            $buscaEventos= "SELECT * FROM usuarios WHERE nick = '$_SESSION[usernameLogIn]'";
            $ejecutarQuery = $conexion_db->query($buscaEventos);
            if(mysqli_num_rows($ejecutarQuery) > 0){
              $infoUsuario = $ejecutarQuery->fetch_array();
              echo "<p>Nombre: $infoUsuario[0] </p><br/>
              <p>Apellidos: $infoUsuario[1] </p><br/>
              <p>Email: $infoUsuario[3] </p><br/>
              <p>Telefono: $infoUsuario[5] </p><br/>
              <p>Localidad: $infoUsuario[6] </p><br/>";
            }else{
              echo "<p>$_SESSION[usernameLogIn]</p>";
              echo "<p>No hay coincidencias</p>";
            }
          mysqli_close($conexion_db);
          ?>
    </div>

<div id="Editar" class="tabcontent">
      <h1>Editar Perfil</h1>
      <form action="../controller/crear.php" method="post"> <input type="hidden" name="id" value="<?php echo $id;?>">
          <br />
            Nombre:
          <br />
            <input type="text" name="nombre" value="">
          <br />
            Apellido:
          <br />
            <input type="text" name="apellido" value="">
          <br />
            Email:
            <br/>
            <input type="text" name="email" value="">
          <br/>
            Telefono:
          <br/>
          <input type="text" name="telefono" value="">
          <br/>
            Contraseña:
          <br />
            <input type="text" name="contraseña" value="">
          <br/>
            Confirmar nueva Contraseña:
          <br/>
            <input type="text" name="confirmarContraseña" value="">
          <br/>
        </br>
            <right> <input class="form-btn" name="submit" type="submit" value="Editar Perfil" /></right>
    </div>
    <div id="Outs" class="tabcontent">
      <h3>Log Out</h3>
      <p>Outs.</p>
    </div>
</div>

<script>
  function cuenta(evt, botones_cuenta) {
      var i, tabcontent, tablinks;
      tabcontent = document.getElementsByClassName("tabcontent");
      for (i = 0; i < tabcontent.length; i++) {
          tabcontent[i].style.display = "none";
      }
      tablinks = document.getElementsByClassName("tablinks");
      for (i = 0; i < tablinks.length; i++) {
          tablinks[i].className = tablinks[i].className.replace(" active", "");
      }
      document.getElementById(botones_cuenta).style.display = "block";
      evt.currentTarget.className += " active";
  }
  document.getElementById("defaultOpen").click();
  </script>

  <footer>
    <p id="derechos">Derechos reservados por la compañia. Copyrigth &copy; 2017-2018. </p>
    <p id="gmail">Para contactar con nosotros:
      <a href="elproyecto@gmail.com">elproyecto@gmail.com</a>.</p>
    </p>
  </footer>
</body>
</html>
