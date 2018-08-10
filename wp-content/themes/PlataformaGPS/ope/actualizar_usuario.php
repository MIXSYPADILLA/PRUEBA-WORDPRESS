<?PHP
   // Obtener valores enviados
   @$nombre  = $_GET['nombre'];
   @$correo  = $_GET['correo'];
   @$usuario = $_GET['usuario'];
   @$rol     = $_GET['rol'];
   @$zonah   = $_GET['zonah'];
   @$estado  = $_GET['estado'];
   @$psw     = $_GET['psw'];

   /* Verificar y actualizar información */
   include("../conex/bd_usuarios.php");
   $Usuario = new usuarios();
   if( $Usuario->modificar($nombre,$correo,$usuario,$rol,$zonah,$estado,$psw) ){
      echo "ok";
   }else{
      echo "Error";
   }
?>