<?PHP
   // Incluir archivo necesario para los objetos
   include("../conex/bd_vehiculos.php");
   // Crear el objeto
   $vehiculo = new vehiculos();
   // Obtener valor seleccionado
   @$vehiculo->indiceSeleccionado = $_GET["sel_vehiculos"];

   //$vehiculo->indiceSeleccionado = $indice;
   //$vehiculo->indiceSeleccionado = "MochisSin2";

   echo $vehiculo->JSON_Reporte();
   /* ----- ----- ----- ----- ----- ----- ----- */
?>