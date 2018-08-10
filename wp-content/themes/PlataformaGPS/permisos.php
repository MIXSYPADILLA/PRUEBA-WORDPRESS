<?PHP
   /* Sistema de permisos para los usuarios de la aplicación */

   class Permisos
   {
      const LEER = 1;
      const AGREGAR = 2;
      const MODIFICAR = 4;
      const ELIMINAR = 8;

      /* ----------------------------------
         Función para comprobar el permiso de acceso del usuario */
      function tiene_permiso( $el_permiso, $permisos_actuales ) {
         if ($el_permiso & $permisos_actuales) {
            return true;
         }
         else {
            return false;
         }
      }
   }

   /* Ajustar para usar los permisos de acuerdo a las páginas de acceso limitado */
   $p = new Permisos();
   $invitado = Permisos::LEER;
   $escritor = $invitado | Permisos::AGREGAR;
   $editor = $escritor | Permisos::MODIFICAR;
   $administrador = $editor | Permisos::ELIMINAR;

   // Verificar permisos
   // Este if devuelve TRUE
   if ( $invitado & Permisos::LEER ) {
       echo "PUEDE LEER";
   }
   else {
       echo "NO PUEDE LEER";
   }
   // SALIDA: PUEDE LEER
    
   //Este if devuelve FALSE
   if ( $invitado & Permisos::AGREGAR) {
       echo "PUEDE AGREGAR";
   }
   else {
       echo "NO PUEDE AGREGAR";
   }
   // SALIDA: NO PUEDE ESCRIBIR

   // Comprobar permiso del usuario

?>