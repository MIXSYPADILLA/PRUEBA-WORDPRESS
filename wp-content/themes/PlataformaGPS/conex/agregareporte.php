<?PHP
   /*
      Módulo que agrega los reportes de los equipos cada determinado tiempo
      Se implementa sólo para función de demostración de la plataforma general
   */
   include("bd_conex.php");

   class agregaReporte extends conexionBD{
      // Array para los datos de los vehiculos

      public $IDvehiculo;

      // Obtener los ID de los vehiculos
      public function obtenerIDs(){
         $this->Consulta("*", "vehiculos", "");
         if($this->numFilas != 0){
            while($r = mysql_fetch_array($this->Resultado)){
                  echo "(". $r[0] .") ";
                  echo $r[1] ." :: ";
                  echo $r[2] ." :: >";
                  echo $r[2] ."<hr>";
               }
         }
      }
   }

   $Reporte = new agregaReporte();
   $Reporte->obtenerIDs();
?>