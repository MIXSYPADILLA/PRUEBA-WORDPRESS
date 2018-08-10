<?PHP
   @session_start();
   /* Agregar valores de sesion temporales para modo demostración */

   /* -----------------------------------------------------------------------
      Módulo de Seguridad del sistema
      Validar sesión del usuario
      - En caso de no haber una sesión iniciada, se cargará el formulario de login para permitir el ingreso al usuario
      - En caso de haber una sesión iniciada, se cargará la página solicitada.
         - Si no hay ninguna página solicitada, se cargará el menú principal del sistema
         - Si hay una página solicitada, se verificará que esté en la lista y posteriormente se cargará el contenido dentro de la aplicación principal
      - En caso de cerrar sesión, se elimina la variable de sesión y se recarga el formulario de Login
   ----------------------------------------------------------------------- */

   $PaginaSolicitada = @$_GET['ver'];

   if( isset($_SESSION['usuario']) )
   {
      echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"css/menu.css\"/>"
            ."<nav>"
               ."<ul>";
      include("pags/menu.php");
      echo "     </ul>"
         ."   </nav>"
         ."<div style=\"clear:both\"></div>";

      // ---------------------------------------------------------------------------------------
      // Páginas que se pueden cargar en caso de ser usuario validado
      switch( $PaginaSolicitada )
      {
         /* ----------------------------------
            Opciones del SubMenú Rastrear
            ----------------------------------*/
         case "rastrea_vehiculo":
            verPagina("rastrea_vehiculo.php");
         break;

         case "rastrea_grupo":
            verPagina("rastrea_grupo.php");
         break;
         /* ----------------------------------
            Opciones del Submenú Reportes
            ----------------------------------*/
         case "reporte_detallado":
            verPagina("repo_detallado.php");
         break;
         case "reporte_resumido":
            verPagina("rep_resumido.php");
         break;
         case "repdes_conductor":
            verPagina("rep_des_conductor.php");
         break;
         /* ----------------------------------
            Opciones del SubMenú Administrar
            ----------------------------------*/
         case "cuentas":
            verPagina("adm_cuentas.php");
         break;
         case "usuarios":
            verPagina("adm_usuario.php");
         break;
         case "roles":
            verPagina("adm_roles.php");
         break;
         /* ----------------------------------
            Cerrar la sesión al mandar el parámetro "salir"
            ----------------------------------*/
         case "nueva_clave": verFormulario("cambio_clave.php");
         break;
         /* ----------------------------------
            Cerrar la sesión al mandar el parámetro "salir"
            ----------------------------------*/
         case "salir": session_destroy();
            @header("Location: ./");
            echo "<a href=\"./\">Sesi&oacute;n cerrada con &eacute;xito,</br> Haga clic para volver a iniciar sesi&oacute;n. </a>";
         break;
         /* ----------------------------------
            Si no se solicita ninguna página o está mal la solicitud, se envía al menú principal
            ----------------------------------*/
         case "panel": include("pags/".$PaginaSolicitada.".php");
         break;
         default: verPagina("panel.php");
      } // -------------------------------------------------------------------------------------
   }
   else {
      // ---------------------------------------------------------------------------------------
      switch( $PaginaSolicitada )
      {
         case "infoincorrecta": echo "<span class='msjError'>Información incorrecta. </span>\n";
            verFormulario("login.php");
         break;

         case "datosvacios": echo "<span class='msjError'>Ingrese información para acceder. </span>";
            verFormulario("login.php");
         break;

         case "ingresevalor": echo "<span class='msjError'>Ingrese un valor válido. </span>";
            verFormulario("login.php");
         break;

         case "panel":
            verPagina("panel.php");
         break;

         default: verFormulario("login.php");
      }
   }
   
   function verPagina($Pagina) { @include('pags/'.$Pagina); }
   function verFormulario($Formulario) { include('frm/'.$Formulario); }
?>