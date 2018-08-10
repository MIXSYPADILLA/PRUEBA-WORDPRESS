<?php
   // Guardar la información de manera separada, y agruparla dentro del arrya de ciudades
   $Coordenada = array("28.216667,-105.383333");
   $FechaHora  = array("05/10/2013 4:55 pm");
   $Lugar      = array("Carretera centro");
   $Velocidad  = array("5km/h");
   $Evento     = array("En movimiento");

   // Array $Registro, contiene la información de los marcadores
   $Registro = array(
                     "Coordenada" => $Coordenada,
                     "FechaHora"  => $FechaHora,
                     "Lugar"      => $Lugar,
                     "Velocidad"  => $Velocidad,
                     "Evento"     => $Evento
                  );
   // Array $Lugar, contiene el nombre de un lugar y sus datos de registro de ubicación
   $Lugar    = array(
                     "Nombre"   => "A Gez, Chihuahua",
                     "Registro" => $Registro
                  );
   /* Después de asignar el valor a la array, se borra la información */
   /*$Registro = null;
   $Lugar    = null;*/

   echo "Nombre de la ciudad: ". $Lugar["Nombre"];
   echo "Registro: ". $Registro["Coordenada"][$indice];

/* ----------------------------------------------------------------------------------------
   $Ciudades = array(
         "A Gez, Chihuahua"                        => array(
                                                      "Coordenadas" => "28.216667,-105.383333"
                                                   ),
      "Abadiano, Michoacán"                    => array(
                                                      "19.983333,-102.85"
                                                   ),
      "Abal, Quintana Roo"                     => array(
                                                      "Coordenadas" => "19.95,-88.866667"
                                                   ),
      "Abala, Yucatán"                         => array(
                                                      "Coordenadas" => "20.633333,-89.683333"
                                                   ),
      "Abalo, Veracruz-Llave"                  => array(
                                                      "Coordenadas" => "20.816667,-97.483333"
                                                   ),
      "Abandonado, Sonora"                     => array(
                                                      "Coordenadas" => "27.666667,-109.933333"
                                                   ),
      "Abaroa, Tlaxcala"                       => array(
                                                      "Coordenadas" => "19.133333,-98.15"
                                                   ),
      "Abasolo, Tamaulipas"                    => array(
                                                      "Coordenadas" => "24.066667,-98.366667"
                                                   ),
      "Abasolo, Tabasco"                       => array(
                                                      "Coordenadas" => "17.65,-92.6"
                                                   ),
      "Abasolo, Chiapas"                       => array(
                                                      "Coordenadas" => "16.8,-92.166667"
                                                   ),
      "Abasolo, Coahuila"                      => array(
                                                      "Coordenadas" => "27.2,-101.4"
                                                   ),
      "Abasolo, Nuevo Leó"                     => array(
                                                      "Coordenadas" => "25.95,-100.4"
                                                   ),
      "Abasolo, Durango"                       => array(
                                                      "Coordenadas" => "25.3,-104.666667"
                                                   ),
      "Abasolo, Guanajuato"                    => array(
                                                      "Coordenadas" => "20.45,-101.516667"
                                                   ),
      " Abasolo del Valle, Veracruz-Llave"     => array(
                                                      "Coordenadas" => "17.766667,-95.5"
                                                   ),
      "Abejones, Oaxaca"                       => array(
                                                      "Coordenadas" => "17.433333,-96.616667"
                                                   ),
      "Abejones, Guerrero"                     => array(
                                                      "Coordenadas" => "18.066667,-101.56666"
                                                   ),
      "Abelardo L. Rodriguez, Nayarit"         => array(
                                                      "Coordenadas" => "22.235,-105.34"
                                                   ),
      "Abelardo L. Rodriguez, Baja California" => array(
                                                      "Coordenadas" => "29.8,-115.483333"
                                                   ),
      "belardo L. Rodriguez, Sinaloa"          => array(
                                                      "Coordenadas" => "25.716667,-108.533333"
                                                   )
   );
   echo $Ciudades["A Gez, Chihuahua"]["Coordenadas"];*/
?>