<?PHP
   // Incluir archivos necesarios
   @session_start();
   include("../conex/bd_usuarios.php");
   $Ingreso = new usuarios();

   /* Obtener valores pasados */
   @$Usuario = $_GET['usuario'];
   @$Clave = $_GET['clave'];

   $Validar = $Ingreso->validarIngreso($Usuario,$Clave);
   if( $Validar != false ){
      /* Pasar los datos a variables de sesión */
      $_SESSION['id']          = $Validar['id'];
      $_SESSION['usuario']     = $Validar['usuario'];
      $_SESSION['nombre']      = $Validar['nombre'];
      $_SESSION['correo']      = $Validar['correo'];
      $_SESSION['activo']      = $Validar['activo'];
      $_SESSION['zonahoraria'] = $Validar['zonashorarias_id'];
      $_SESSION['rol']         = $Validar['roles_id'];
      //$_SESSION['grupo']       = $Validar['gruposusuarios_id'];
      echo "ok";
   }
   else{
      echo "error";
   }
?>