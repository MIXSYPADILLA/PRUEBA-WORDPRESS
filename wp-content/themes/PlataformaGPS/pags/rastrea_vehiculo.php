   <?PHP
      include("ope/cons_vehiculo.php");
   ?>
   <!-- ========== Estilos para la sección de GoogleMaps y el reporte ========== -->
   <link rel="stylesheet" type="text/css" href="css/interfaz.css"/>
   <div id="imgCargando"></div>

   <!-- ========== Librería jQuery y API de Google Maps ========== -->
   <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
   <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
   <script type="text/javascript">
      $( document ).ready( function(){
         // Cargar Mapa Google
         var marcador;
         <?PHP $Vehiculo->declararCoords(); ?>
         var OpcionesMapa = {
            zoom: 16,
            center: Coordenadas[<?PHP
               if($Vehiculo->Filas >0) echo $Vehiculo->Filas-1;
               else echo $Vehiculo->Filas;
            ?>],
            mapTypeId: google.maps.MapTypeId.ROADMAP
         };

         var mapa = new google.maps.Map(document.getElementById("mapaGoogle"), OpcionesMapa);
         <?PHP $Vehiculo->PonerMarcadores(); ?>

         function ponMarcador(titulo,Coordenadas) {
            marcador = new google.maps.Marker({
               position: Coordenadas,
               map: mapa,
               draggable: false,
               title: titulo
            });
            marcador.setAnimation(google.maps.Animation.DROP);
            //mapa.setCenter(Coordenadas)
         }

         var lineas = new google.maps.Polyline({
           path: Coordenadas,
            map: mapa,
            strokeColor: '#9B9E62',
            strokeWeight: 8,
            strokeOpacity: 0.9,
            clickable: false
         });

         /* Eventos de la interfaz */
         $("#sel_vehiculos").change(function(){
            // Hacer consulta de posicion y obtener coordenadas
            document.getElementById("frmVehiculo").submit()
         });

         $("#imgCargando").addClass("oculto")
         $(".frm-info").removeClass("oculto")
         $("#mapaGoogle").removeClass("oculto")
         $("#divtabla").removeClass("oculto")
      });
   </script>
   
   <!-- ====================================== -->
   <link rel="stylesheet" type="text/css" href="css/rastreo.css"/>

   <aside class="frm-info oculto">
      <section class="divIzq">
         <!--<small>&Uacute;ltimo evento:</small>-->
         <small>Seleccione un equipo:</small>
      </section>

      <section id="divDer">
         <!--<span>Carretera Federal 207, Xel H&aacute;, Quintana Roo, Mexico a las 22:11:04</span>-->
         <form action="" method="post" id="frmVehiculo">
            <select name="sel_vehiculos" id="sel_vehiculos">
               <?PHP $Vehiculo->LlenarLista(); ?>
            </select>
         </form>
      </section>
   </aside>

   <div style="clear:both;"></div>
   <!-- ====================================== -->
   <div id="mapaGoogle" class="oculto"></div>

   <!-- ======================================
        Contenido adicional de la página
        ======================================-->

   <!-- Agregar elementos de la página-->
   <!-- Formulario de lista de vehículos -->
   <div id="divtabla" class="oculto">
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
               $Vehiculo->LlenarReporte();
            ?>
         </tbody>

      </table>
   </div>