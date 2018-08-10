<html>
   <head>
      <title>Codificacion Geografica Inversa</title>
      <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
      <script>
         $(document).ready(function(){
            data = ""
            datosCompletos = ""
            latitud = document.getElementById("Latitud")
            longitud = document.getElementById("Longitud")
            Direccion = document.getElementById("Direccion")
            Estado = document.getElementById("Estado")

            /*$.get("http://maps.googleapis.com/maps/api/geocode/json?latlng="+latitud+","+longitud+"&sensor=false",function(data){
               Direccion.textContent = data["results"][0]["formatted_address"] /* Devuelve la dirección completa *
               datosCompletos = data
*/
            $("#buscarDireccion").click(function (){
               obtDireccion(latitud.value,longitud.value,Direccion,Estado)
            });
            /* Obtener la dirección exacta de las coordenadas */
            function obtDireccion(latitud,longitud,direccion,estado){
               $.get("http://maps.googleapis.com/maps/api/geocode/json?latlng="+latitud+","+longitud+"&sensor=false",function(data){
                  direccion.textContent = data["results"][0]["formatted_address"]
                  //objeto.textContent = data["results"][0]["formatted_address"] /* Devuelve la dirección completa */
                  estado.textContent = data["results"][0]["address_components"][2]["long_name"]
                  
                  /*estado.textContent = data["results"][3]["address_components"][0]["long_name"] +", "+data["results"][3]["address_components"][1]["long_name"] /* Devuelve el nombre del municipio y el estado */
               });
            }
         });
      </script>
   </head>

   <body>
      <b>Latitud:</b><input type="text" id="Latitud" value="21.083333"/><br/>
      <b>Longitud:</b><input type="text" id="Longitud" value="-86.766667"/><br/>
      <button id="buscarDireccion">Obtener direcci&oacute;n</button>
      <br/>
      <b>Direcci&oacute;n: </b><span id="Direccion"></span><br/>
      <b>Estado: </b><span id="Estado"></span>
   </body>
</html>