<?php
  session_start();
?>
<html>
<head>
  <meta charset="UTF-8">
  <title>Crear eventos</title>
  <link type="text/css" rel="stylesheet" href="../estilos/estilo.css"/>

  <style>
  .event{
    position:absolute;
    border: 0.1vw solid black;
    display: block;
    height: auto;
    overflow: hidden;
    float: right;
    text-align: center;
    width: 95%;
    padding: 1vw 1.9vw;
  }
  </style>
</head>
<body>

  <div class="bmenu">
    <a href="#default" class="logo">Foto_Logo</a>
    <div class="btnderecha">
    <a class="active" href="inicio.html">Inicio</a>
    <a href="busqueda.html">Buscar</a>
      <a href="crearEvento.html">Crear Evento</a>
    <a href="cuenta.html">Cuenta</a>
    </div>
  </div>
</br>
<div class="event">
  <h2> Creacion de eventos</h2>
  <form action="../controller/crear.php" method="post"> <input type="hidden" name="id">
    Nombre Evento:
    <input type="text" name="nombre" value="">
  <br />
    Fecha Evento:
    <input type="date" name="bfecha" value="2018-06-10" min="2018-03-25" max="2019-06-10" step="1">
  </br>
  </br>
    Descripcion:
  </br>
  </br>
    <textarea id="descripcion" name="descripcion" placeholder="Descripcion.." style="height:90px;width:800px"></textarea>
  </br>
    Precio:
      <input type="text" name="Precio" value="">
  </br>
      <input class="form-btn" name="Crear_Evento" type="submit" value="Crear Evento" />
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
