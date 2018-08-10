// Función para cargar el mapa, indicándole las opciones
function initialize() {
   //Lugares
   var Cancun = new google.maps.LatLng(21.16005, -86.8475)

   // * - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - *
   // Opciones del mapa
   var opcionesMapa = {
      zoom: 8,
      center: Cancun,
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
              
   var mCancun = ponMarcador(mapa.getCenter(), "99F");

   /* =========================================
      Eventos
      ========================================= */
   /* -----
      Eventos del mapa */
   google.maps.event.addListener(mapa, 'click', function(event) {
      ponMarcador(event.latLng,"AFCACA");
   });

   /* -----
      Eventos de marcadores */
   // Hacer doble clic para acercar y centrar el mapa
   google.maps.event.addListener(mCancun, 'dblclick', function() {
      mapa.setZoom(10);
      mapa.setCenter(mCancun,getPosition());
   });
   // Hacer clic para mostrar información
   google.maps.event.addListener(mCancun, 'click', function() {
      MensajeSecreto.open(mapa,mCancun);
   });

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