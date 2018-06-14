<?php
  session_start();
?>
<html>
<head>
  <meta charset="UTF-8">
  <title>Pagina de Busqueda</title>
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
  <div class="bmain">
<h1>BUSCAR EVENTO<h1>
    <form name="formulario" method="post" action="../scripts/search.php">
  <!-- Campo de busqueda por fecha -->
  Selecciona la fecha:
  <input type="date" name="bfecha" value="2018-06-10" min="2018-03-25"
                                  max="2019-06-10" step="1">
  <!--Campo de busqueda por nombre de evento -->
  <input type="text" name="bnombre" >
  <!--Campo de busqueda por ciudad -->
  Ciudad:
  <input type="text" name="bciudad" value="Santander">
  <input type="submit" value="Buscar" />
</form>

  </div>
  <footer>
    <p id="derechos">Derechos reservados por la compañia. Copyrigth &copy; 2017-2018. </p>
    <p id="gmail">Para contactar con nosotros:
      <a href="elproyecto@gmail.com">elproyecto@gmail.com</a>.</p>
    </p>
  </footer>
</body>
</html>
