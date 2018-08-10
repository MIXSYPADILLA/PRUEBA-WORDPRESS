<?PHP
   // Incluir archivo necesario para los objetos
   include("../conex/bd_roles.php");
   // Crear el objeto
   $rol = new roles();
   // Obtener valor seleccionado

   echo $rol->JSON_Roles();
   /* ----- ----- ----- ----- ----- ----- ----- */
?>