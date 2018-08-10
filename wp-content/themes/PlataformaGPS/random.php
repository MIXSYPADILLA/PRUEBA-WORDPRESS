<?php
   function numRandom($minimo, $maximo, $LONGITUD)
   {
      $numero = "";
      /* Determinar una semilla para la función al azar (punto base númerico para ejecutar el algoritmos de aleatoridad))
         Usando la función time()
         - Necesario en caso de que la versión de PHP sea inferior a la 4.2.0 */
      mt_srand(time());
      /* Llenar número la cantidad de veces necesaria */
      $i = 1;
      while( $i <= $LONGITUD ) {
         // Asignar los números generados a la variable
         $numero .= mt_rand( $minimo, $maximo );
         $i++;
      }
      return $numero;
   }

   /* ===============================================
      Random con la Longitud restringida dentro de los límites de México
      =============================================== */
   function LngRandom()
   {
      /* Rango de longitud mínima y máxima multiplicado para eliminar decimales*/
      $decimales = 100000;
      $minimo = 99 * $decimales;
      $maximo = 103.36667 * $decimales;
      // Asignar los números generados a la variable
      $Numero = mt_rand( $minimo, $maximo );
      return $Numero/$decimales;
   }

   /* ===============================================
      Random con la latitud restringida dentro de los límites de México
      =============================================== */
   function LatRandom()
   {
      /* Rango de latitud mínima y máxima multiplicado para eliminar decimales*/
      $decimales = 1000000;
      $minimo = 17.5408333 * $decimales;
      $maximo = 28.718333 * $decimales;
      // Asignar los números generados a la variable
      $Numero = mt_rand( $minimo, $maximo );
      return $Numero/$decimales;
   }
?>