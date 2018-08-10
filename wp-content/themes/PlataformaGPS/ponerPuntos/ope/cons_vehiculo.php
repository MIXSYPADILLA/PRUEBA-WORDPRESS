   <?PHP
      // Obtener el elemento seleccionado de la lista
      @$vehiculo = $_POST['sel_vehiculos'];

      /* =======================================
         | NO MODIFICAR | Información necesaria
         ======================================= */
      // Array $Registro, contiene la información de los marcadores
      // Guardar la información de manera separada, y agruparla dentro del array de ciudades
      $Coordenada = array("28.216667,-105.383333", "28.21666,-105.38335", "28.21684,-105.383652");
      $FechaHora  = array("05/10/2013 4:55 pm", "04/10/2013 3:15 pm", "04/10/2013 1:17 pm");
      $Lugar      = array("Carretera Federal", "Av. Torres","Av. Talleres");
      $Velocidad  = array("25 km/h", "40 km/h", "32 km/h");
      $Evento     = array("En movimiento", "En movimiento", "En movimiento");

      // Array $Registro, contiene la información de los marcadores
      $Registro = array(
                        "Coordenada" => $Coordenada,
                        "FechaHora"  => $FechaHora,
                        "Lugar"      => $Lugar,
                        "Velocidad"  => $Velocidad,
                        "Evento"     => $Evento
                     );
      // Usar un array de nombres y un array con array de registros :_:_:_:_: Prueba :_:_:_:_:*/
      $Lugar    = array(
                        "Nombre"   => array("A Gez, Chihuahua",
                              "Abadiano, Michoacán",
                              "Abal, Quintana Roo",
                              "Abala, Yucatán",
                              "Abalo, Veracruz-Llave",
                              "Abandonado, Sonora",
                              "Abaroa, Tlaxcala",
                              "Abasolo, Tamaulipas",
                              "Abasolo, Tabasco",
                              "Abasolo, Chiapas",
                              "Abasolo, Coahuila",
                              "Abasolo, Nuevo León",
                              "Abasolo, Durango",
                              "Abasolo, Guanajuato",
                              "Abasolo del Valle, Veracruz-Llave",
                              "Abejones, Oaxaca",
                              "Abejones, Guerrero",
                              "Abelardo L. Rodriguez, Nayarit",
                              "Abelardo L. Rodriguez, Baja California",
                              "Abelardo L. Rodriguez, Sinaloa"),
                        "Registro" => $Registro
                     );

      /* ======================================= */

      /* Consulta de vehículos según el elemento seleccionado del select */
      if( !isset($vehiculo) )
      {
         // Hacer consulta y regresar las coordenadas
         $Coordenadas = "20.68009, -101.35403";
      } else {
         // Hacer consulta y obtener las coordenadas de la opción seleccionada
         $Coordenadas = $vehiculo;
      }

      function lugar($Coordenadas,$coord) { // Si la coordenada es la misma que la que se envió, se seleciona
         if( $Coordenadas==$coord ) {
            echo "selected";
         }
      }

      function LlenarReporte($Registro, $indice)
      {
         // Imprimir resultados
         for( $indice=0; $indice < count($Registro["Coordenada"]); $indice++ )
         {
            echo '<tr>'
               .'<td>'. ($indice+1) .'</td>'
               .'<td>'. $Registro["FechaHora"][$indice] .'</td>'
               .'<td>'. $Registro["Evento"][$indice] .'</td>'
               .'<td>'. $Registro["Coordenada"][$indice] .'</td>'
               .'<td>'. $Registro["Velocidad"][$indice] .'</td>'
               .'<td>'. $Registro["Lugar"][$indice] .'</td>'
             .'</tr>';
         }
      }

/*
"28.216667,-105.383333",
"19.983333,-102.85",
"19.95,-88.866667",
"20.633333,-89.683333",
"20.816667,-97.483333",
"27.666667,-109.933333",
"19.133333,-98.15",
"24.066667,-98.366667",
"17.65,-92.6",
"16.8,-92.166667",
"27.2,-101.4",
"25.95,-100.4",
"25.3,-104.666667",
"20.45,-101.516667",
"17.766667,-95.5",
"17.433333,-96.616667",
"18.066667,-101.566667",
"22.235,-105.34",
"29.8,-115.483333",
"25.716667,-108.533333"
*/
?>