<?PHP
/**
* Clase para manipular información de la tabla Vehiculos
*
* Clase con elementos modificados para la interacción de la
* base de datos con la tabla vehiculos
*
  <- Se incluye el archivo bd_conex.php de forma automatica
* 
@version 1.0.1
@author Alan Jimenez Quiroz
*/
   include("bd_conex.php");
   class vehiculos extends conexionBD
   {
      public $indiceSeleccionado = "";

      function LlenarLista()
      {
         $this->Consulta("*", "vehiculos", "");
         // Contar la cantidad de resultados
         $this->Filas = mysql_num_rows($this->Resultado);
         if( $this->Filas > 0){
            echo "<option value='0'>Elija un veh&iacute;culo</option>";
            for( $i=0; $i < $this->Filas; $i++ ) {
               // Obtener resultados
               $Columnas = mysql_fetch_assoc($this->Resultado);
               echo "<option value='". $Columnas['clave'] ."'";
               if( $Columnas['clave'] == $this->indiceSeleccionado) echo "selected";
               echo ">".$Columnas['nombre'] ."</option>\n";
            }
         }
         else {
            echo "<option value='0'>No hay resultados</option>";
         }
      }

      function LlenarReporte()
      {
         $this->Consulta("*","ubicaciones","vehiculos_clave='". $this->indiceSeleccionado."'");
         $this->Filas = mysql_num_rows($this->Resultado);
         if( $this->Filas > 0){
            for( $i=0; $i < $this->Filas; $i++ ) {
               // Obtener resultados
               $Columnas = mysql_fetch_assoc($this->Resultado);
               echo '<tr>'
               .'<td>'. ($this->Filas-$i) .'</td>'
               .'<td>'. $Columnas['fecha'] .'</td>'
               .'<td>'. $Columnas['latitud'] .",". $Columnas['longitud'] .'</td>'
               .'<td>'. $Columnas['evento'] .'</td>'
               .'<td>'. $Columnas['velocidad'] .'</td>'
               .'<td>'. $Columnas['lugar'] .'</td>'
               .'</tr>';
            }
         }
         else {
            echo ("<tr><td colspan='6'>No hay registros de actividad de este dispositivo.</td></tr>");
         }
      }

      function declararCoords()
      {
         $this->Consulta("latitud,longitud","ubicaciones","vehiculos_clave='". $this->indiceSeleccionado."'");
         $this->Filas = mysql_num_rows($this->Resultado);
         if( $this->Filas > 0){
            echo "var Coordenadas=[";
            for( $i=0; $i < $this->Filas; $i++ ) {
               // Obtener resultados
               $Columnas = mysql_fetch_assoc($this->Resultado);
               echo "new google.maps.LatLng(". $Columnas['latitud'] .",". $Columnas['longitud'].")";
               if( ($i+1)<$this->Filas ) {
                  echo ",";
               }
            }
            echo "];\n";
         } else {
            // Si no hay opción elegida, se ponen las coordenadas predeterminadas
            echo "var Coordenadas=[new google.maps.LatLng(23.629583,-102.538335)];\n";
         }
      }

      function PonerMarcadores()
      {
         $this->Consulta("*","ubicaciones","vehiculos_clave='". $this->indiceSeleccionado ."'");
         $this->Filas = mysql_num_rows($this->Resultado);
         //echo "//Total de filas: ". $this->Filas;
         if( $this->Filas > 0){
            for( $i=0; $i < $this->Filas; $i++ ) {
               // Obtener resultados
               $Columnas = mysql_fetch_assoc($this->Resultado);
               $Informacion = "\"#". ($this->Filas - $i)
                  ." | ". $Columnas['fecha'] ." (". $Columnas['evento'] ." \\n "
                  .$Columnas['latitud'] .",". $Columnas['longitud'] ." \\n "
                  ."Velocidad: ". $Columnas['velocidad'] ." \\n "
                  ."Ubicación: ". $Columnas['lugar'] ."\"";
               echo "\n ponMarcador(". $Informacion .",Coordenadas[". $i ."]); \n";
            }
         }
         else{
            // No poner ningún marcador
         }
      }

      function JSON_Reporte()
      {
         /* Array para los datos de JSON */
         /* ---------------------------- */
         $this->Consulta("*","ubicaciones","vehiculos_clave='". $this->indiceSeleccionado."'");
         $json = array();
         while( $res = mysql_fetch_assoc($this->Resultado) ){
            $json[] = array(
               'id' => array($res['id']),
               'fecha' => array($res['fecha']),
               'latitud' => array($res['latitud']),
               'longitud' => array($res['longitud']),
               'evento' => array($res['evento']),
               'velocidad'=> array($res['velocidad']),
               'lugar' => array($res['lugar'])
            );
         }

         return json_encode($json);
      }

      /* ---------------------------------- */
      function JSON_ReporteResumido()
      {
         /* Array para los datos de JSON */
         /* ---------------------------- */
         $this->Consulta("id,DAY(fecha) AS dia, MONTH(fecha) AS mes, YEAR(fecha) AS agno, hour(fecha) AS hora, minute(fecha) AS minuto, evento, velocidad, lugar","ubicaciones","vehiculos_clave='". $this->indiceSeleccionado."'");
         $json = array();
         while( $res = mysql_fetch_assoc($this->Resultado) ){
            $json[] = array(
               'id' => array($res['id']),
               'dia' => array($res['dia']),
               'mes' => array($res['mes']),
               'agno' => array($res['agno']),
               'hora' => array($res['hora']),
               'minuto' => array($res['minuto']),
               'evento' => array($res['evento']),
               'velocidad'=> array($res['velocidad']),
               'lugar' => array($res['lugar'])
            );
         }

         return json_encode($json);
      }
   }
?>