<?PHP
   // Obtener valor seleccionado
   @$indice = $_POST["sel_vehiculos"];
   // Incluir archivo necesario para los objetos
   include("conex/bd_vehiculos.php");
   // Crear el objeto
   $Vehiculo = new vehiculos();
   $Vehiculo->indiceSeleccionado = $indice;
   /* ----- ----- ----- ----- ----- ----- ----- */
?>