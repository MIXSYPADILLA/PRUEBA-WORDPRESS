<?PHP
   // Obtener valores enviados
   @$usuario = $_GET['usuario'];

   /* Eliminar usuario */
   include("../conex/bd_usuarios.php");
   $Usuario = new usuarios();
   // Eliminar
   if( $Usuario->borrar($usuario) ){
      echo "ok";
   }else{
      echo "error";
   }
?>