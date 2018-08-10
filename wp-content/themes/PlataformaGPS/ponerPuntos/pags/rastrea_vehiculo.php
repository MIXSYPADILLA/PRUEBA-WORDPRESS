   <?PHP // Operaciones con la opción seleccionada
      include("ope/cons_vehiculo.php");
   ?>
   <!--======================================
       Librería para la API de Google Maps
       ======================================-->
   <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>

   <!--======================================
       JQuery e inicialización del mapa de Google y otros eventos de la página
       ======================================-->
   <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
   <script type="text/javascript">
      $( document ).ready( function(){
         // Cargar Mapa Google
         var marcador;
         var Coordenadas = new google.maps.LatLng(23.629583,-102.538335);
         /*var Coordenadas = new google.maps.LatLng(<?php //echo $Registro["Coordenada"][0]; ?>);
         var Coordenadas2 = new google.maps.LatLng(<?php //echo $Registro["Coordenada"][1]; ?>);
         var Coordenadas3 = new google.maps.LatLng(<?php //echo $Registro["Coordenada"][2]; ?>);*/
         var OpcionesMapa = {
            zoom: 6,
            center: Coordenadas,
            disableDoubleClickZoom: true,
            mapTypeId: google.maps.MapTypeId.SATELLITE
         };

         var mapa = new google.maps.Map(document.getElementById("mapaGoogle"), OpcionesMapa);
         //ponMarcador("Centro", Coordenadas);
         /*ponMarcador("Centro", Coordenadas2);
         ponMarcador("Centro", Coordenadas3);*/

         function ponMarcador(titulo,Coordenadas) {
            marcador = new google.maps.Marker({
               position: Coordenadas,
               map: mapa,
               draggable:true,
               title: titulo
            });
            marcador.setAnimation(google.maps.Animation.DROP);
            //mapa.setCenter(Coordenadas)
         }

         var ruta = [
           /*new google.maps.LatLng(<?php //echo $Registro["Coordenada"][0]; ?>),
           new google.maps.LatLng(<?php //echo $Registro["Coordenada"][1]; ?>),
           new google.maps.LatLng(<?php //echo $Registro["Coordenada"][2]; ?>)*/
         ];

         var lineas = new google.maps.Polyline({
           path: ruta,
            map: mapa,
            strokeColor: '#9B9E62',
            strokeWeight: 8,
            strokeOpacity: 0.9,
            clickable: false
         });

         /* --------------------------------------------
            Crear marcador al dar clic en el mapa
         -------------------------------------------- */
         google.maps.event.addListener(mapa, "dblclick", function(evento) {
            //Obtengo las coordenadas separadas
            var latitud = evento.latLng.lat();
            var longitud = evento.latLng.lng();

            //Puedo unirlas en una unica variable si asi lo prefiero
            var coordenada = evento.latLng.lat() + ", " + evento.latLng.lng();

            //Las muestro con un popup
            //alert(coordenada);

            //Creo un marcador utilizando las coordenadas obtenidas y almacenadas por separado en "latitud" y "longitud"
            var coordenada = new google.maps.LatLng(latitud, longitud); /* Debo crear un punto geografico utilizando google.maps.LatLng */
            var marcador = ponMarcador("Ubicación: "+ coordenada, coordenada)
            var historial = document.getElementById("historial").innerHTML
            historial += "<tr><td>"+ coordenada +"</td></</tr>"
            document.getElementById("historial").innerHTML = historial
         }); //Fin del evento

         /* Eventos de la interfaz */
         $("#sel_vehiculos").change(function(){
            // Hacer consulta de posicion y obtener coordenadas
            document.getElementById("frmVehiculo").submit()
         });
      });
   </script>

   <!-- ======================================
   Hoja de estilos para la apariencia de la sección de rastreo y el mapa de Google
   ======================================-->
   <link rel="stylesheet" type="text/css" href="css/rastreo.css"/>
   <!-- ====================================== -->

   <aside class="frm-info">
      <section class="divIzq">
         <small>&Uacute;ltimo evento:</small>
         <small>Seleccione un equipo:</small>
      </section>

      <section id="divDer">
         <span>Carretera Federal 207, Xel H&aacute;, Quintana Roo, Mexico a las 22:11:04</span>
         <form action="" method="post" id="frmVehiculo">
            <select name="sel_vehiculos" id="sel_vehiculos" disabled>
               <option value="0">Deshabilitado</option>
               <option value="A Gez, Chihuahua" <?PHP //lugar($Coordenadas,"28.216667,-105.383333"); ?>> A Gez, Chihuahua</option>
               <option value="19.983333,-102.85"     <?PHP //lugar($Coordenadas,"19.983333,-102.85");     ?>> Abadiano, Michoacán</option>
               <option value="19.95,-88.866667"      <?PHP //lugar($Coordenadas,"19.95,-88.866667");      ?>> Abal, Quintana Roo</option>
               <option value="20.633333,-89.683333"  <?PHP //lugar($Coordenadas,"20.633333,-89.683333");  ?>> Abala, Yucatán</option>
               <option value="20.816667,-97.483333"  <?PHP //lugar($Coordenadas,"20.816667,-97.483333");  ?>> Abalo, Veracruz-Llave</option>
               <option value="27.666667,-109.933333" <?PHP //lugar($Coordenadas,"27.666667,-109.933333"); ?>> Abandonado, Sonora</option>
               <option value="19.133333,-98.15"      <?PHP //lugar($Coordenadas,"19.133333,-98.15");      ?>> Abaroa, Tlaxcala</option>
               <option value="24.066667,-98.366667"  <?PHP //lugar($Coordenadas,"24.066667,-98.366667");  ?>> Abasolo, Tamaulipas</option>
               <option value="17.65,-92.6"           <?PHP //lugar($Coordenadas,"17.65,-92.6");           ?>> Abasolo, Tabasco</option>
               <option value="16.8,-92.166667"       <?PHP //lugar($Coordenadas,"16.8,-92.166667");       ?>> Abasolo, Chiapas</option>
               <option value="27.2,-101.4"           <?PHP //lugar($Coordenadas,"27.2,-101.4");           ?>> Abasolo, Coahuila</option>
               <option value="25.95,-100.4"          <?PHP //lugar($Coordenadas,"25.95,-100.4");          ?>> Abasolo, Nuevo León</option>
               <option value="25.3,-104.666667"      <?PHP //lugar($Coordenadas,"25.3,-104.666667");      ?>> Abasolo, Durango</option>
               <option value="20.45,-101.516667"     <?PHP //lugar($Coordenadas,"20.45,-101.516667");     ?>> Abasolo, Guanajuato</option>
               <option value="17.766667,-95.5"       <?PHP //lugar($Coordenadas,"17.766667,-95.5");       ?>> Abasolo del Valle, Veracruz-Llave</option>
               <option value="17.433333,-96.616667"  <?PHP //lugar($Coordenadas,"17.433333,-96.616667");  ?>> Abejones, Oaxaca</option>
               <option value="18.066667,-101.566667" <?PHP //lugar($Coordenadas,"18.066667,-101.566667"); ?>> Abejones, Guerrero</option>
               <option value="22.235,-105.34"        <?PHP //lugar($Coordenadas,"22.235,-105.34");        ?>> Abelardo L. Rodriguez, Nayarit</option>
               <option value="29.8,-115.483333"      <?PHP //lugar($Coordenadas,"29.8,-115.483333");      ?>> Abelardo L. Rodriguez, Baja California</option>
               <option value="25.716667,-108.533333" <?PHP //lugar($Coordenadas,"25.716667,-108.533333"); ?>> Abelardo L. Rodriguez, Sinaloa</option>
            </select>
         </form>
      </section>
   </aside>

   <div style="clear:both;"></div>
   <!-- ====================================== -->
   <div id="mapaGoogle"></div>

   <!-- ======================================
        Contenido adicional de la página
        ======================================-->

   <!-- Agregar elementos de la página-->
   <!-- Formulario de lista de vehículos -->
   <div>
   <!--
      <table class="reporte">
         <thead>
            <tr>
               <th>#</th>
               <th>Fecha/Hora</th>
               <th>Código</th>
               <th>Lat/Lon</th>
               <th>kph</th>
               <th>Dirección</th>
            </tr>
         </thead>
         <tbody>
            <?PHP // Llenar la tabla con el reporte
               //LlenarReporte($Registro, 0);
            ?>
         </tbody>

      </table>
            -->
   </div>
   <!-- Tabla para coordenadas de muestra -->
   <table id="historial">
      Haga doble clic en el mapa para crear un marcador, al terminar copie las coordenadas de abajo.
   </table>