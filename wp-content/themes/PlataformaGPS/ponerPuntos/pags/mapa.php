<?php
   /* ==============================================================
      Generador de números aleatorios
      ==============================================================
   */
   require("random.php");
   // Coordenadas del territorio mexicano, según el INEGI
   $LatitudMin  = "14.54083";
   $LongitudMin = "86.71";
   $LatitudMax  = "32.71833";
   $LongitudMax = "118.36667";
   // Cantidad máxima de marcadores a usar
   $Limite = 10;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
   <head profile="http://www.w3.org/2005/10/profile">
      <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
      <link rel="icon" type="image/png" href="img/pomicon.png">
      <title> Peace of Mind for Latinamerica S.A. de C.V. | Demo </title>
      <script>
         // Función para cargar el mapa, indicándole las opciones
         function initialize() {
            //Lugares
            <?php
               for( $i=1; $i <= $Limite; $i++ )
               {
                  // Coordenadas de los marcadores
                  echo " var marcador_". $i ." = new google.maps.LatLng(". LatRandom() .", ". -LngRandom() ."); \n \t \t";
               }
            ?>
            // * - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - *
            // Opciones del mapa
            var opcionesMapa = {
               zoom: 4,
               center: marcador_1,
               mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            // Definir y crear el objeto mapa
            var mapa = new google.maps.Map(document.getElementById('map-canvas'), opcionesMapa);
            var MensajeSecreto;
            // * - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - *
            /* =========================================
               Marcadores
               ========================================= */
            ponMensaje("<b>#1</b> Equipo 1 <i>(Moviendo)</i> <br>" +
                       "<b>Dirección:</b> Bonampak 237,4,77500 Cancún, Quintana Roo, México <br>" +
                       "<b>Velocidad:</b> 0.0 kph <br>" +
                       "<b>Fecha:</b> 2013/09/19 18:51:30 <br>" +
                       "<b>GPS:</b> 21.14902/-86.82155 [#Sats 6]");
            <?php
               for( $i=1; $i <= $Limite; $i++ )
               {
                  echo "marcador_". $i ." = ponMarcador(marcador_". $i .", \"99F\"); \n \t \t \t";
               
               }
            ?>
            /* =========================================
               Eventos
               ========================================= */
            /* -----
               Eventos del mapa */
            /*google.maps.event.addListener(mapa, 'click', function(event) {
               ponMarcador(event.latLng,"AFCACA");
            });*/

            /* -----
               Eventos de marcadores */
            // Hacer doble clic para acercar y centrar el mapa
            <?php
               for( $i=1; $i <= $Limite; $i++ )
               {
                  echo "google.maps.event.addListener(marcador_". $i .", 'dblclick', function() { \n"
                       ."  mapa.setZoom(10); \n"
                       ."  mapa.setCenter(marcador_". $i .",getPosition()); \n"
                       ."}); \n"
                       ."// Hacer clic para mostrar información \n"
                       ."google.maps.event.addListener(marcador_". $i .", 'click', function() { \n"
                       ."  MensajeSecreto.open(mapa,marcador_". $i ."); \n"
                       ."}); \n";
               }
            ?>

            /* =========================================
               Funciones
               ========================================= */
            /* -----
               Funciones del mapa */
            
            /* -----
               Funciones de marcadores */
            // Colocar un marcador de ubicación en el punto indicado por el cursor
            
            function ponMarcador(ubicacion,pinColor) {
             //var pinColor = "CAA7C5"; // Color del marcador
             var pinImage = new google.maps.MarkerImage("http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=%E2%80%A2|" + pinColor,
                 new google.maps.Size(21, 34),
                 new google.maps.Point(0,0),
                 new google.maps.Point(10, 34));
             var pinShadow = new google.maps.MarkerImage("http://chart.apis.google.com/chart?chst=d_map_pin_shadow",
                 new google.maps.Size(40, 37),
                 new google.maps.Point(0, 0),
                 new google.maps.Point(12, 35));

               var marcador = new google.maps.Marker({
                  position: ubicacion, // Posición del marcador
                  map: mapa, // Mapa al que se agregará
                  title: 'Clic para ver información, doble clic para acercar',
                  icon: pinImage,
                  shadow: pinShadow
               });
               return marcador;
            }
            function ponMensaje(mensaje) {
               MensajeSecreto = new google.maps.InfoWindow({
                  content: mensaje,
                  size: new google.maps.Size(50,50)
               });
            }
         }

         /* =========================================
            Función para cargar el mapa de manera 
               asíncrona al contenido adicional de
               la página
            ========================================= */
         function cargarMapa() {
            var script = document.createElement('script');
            script.type = 'text/javascript';
            script.src = 'http://maps.googleapis.com/maps/api/js?key=AIzaSyDN1wWwhJhkNmUzAzv4vQhET1I5_9gSR2g&sensor=false&' + 'callback=initialize';
            document.body.appendChild(script);
         }

         // Llamar a la función para cargar el mapa con las opciones
         window.onload = cargarMapa;
      </script>
      <link href="css/estilo.css" rel="stylesheet" type="text/css">
   </head>

   <body>
      <div id="map-canvas"></div>
      <button id="verPosicion" name="verPosicion"> Posici&oacute;n nueva </button>
   </body>
</html>