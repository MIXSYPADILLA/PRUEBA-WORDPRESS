<?PHP
   //Conexión a la base de datos
   $BD_Usuario = "root";
   $BD_Clave   = "";
   $BD_Host    = "localhost:3306";
   $BD_Nombre  = "plataforma";
   $Conexion;

   $Conexion = mysql_connect($BD_Host, $BD_Usuario, $BD_Clave);
   //if( $Conexion )  echo "//Conexi&oacute;n Correcta.\n";
   mysql_select_db($BD_Nombre,$Conexion) or die (mysql_error($Conexion));

   for($i=1;$i<=29;$i++)
   {
/* --------------------------------------------------------------- */
      $Insertar = "";
/* --------------------------------------------------------------- */
      mysql_query($Insertar,$Conexion) or die (mysql_error($Conexion));
/* --------------------------------------------------------------- */
      echo "\n----------- ($i) -----------\n";
   }
   echo "\n".$Insertar;
   // Cerrar la conexión
   mysql_close($Conexion);
?>