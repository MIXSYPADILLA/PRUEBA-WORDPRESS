<?php
   @session_start();
?>
<!DOCTYPE HTML>
<html>
   <head>
      <title>Peace of Mind Tracking Technology</title>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
      <meta name="copyright" content="Copyright © 2013 Peace of Mind Tracking Technology S.A. de C.V.">
      <meta http-equiv="cache-control" content="no-cache">
      <meta http-equiv="pragma" content="no-cache">
      <meta name="author" content="Alan Jimenez">
      <meta http-equiv="expires" content="0">
      <link rel="icon" type="image/png" href="img/pomicon.png">
      <link rel="stylesheet" type="text/css" href="css/reset.css"/>
      <link rel="stylesheet" type="text/css" href="css/estilo.css"/>
      <link rel="stylesheet" type="text/css" href="css/ingreso.css"/>
   </head>

   <body>
      <header><a href="./">&nbsp;</a></header>

      <div id="contenedor">
         <?php
            require('seguridad.php');
         ?>
      </div>

      <footer>
         <p> Copyright © 2013 Peace of Mind Tracking Technology S.A. de C.V. &nbsp;|&nbsp;
            <a href="#"> Pol&iacute;tica de Privacidad </a>
         </p>
      </footer>

   </body>
</html>