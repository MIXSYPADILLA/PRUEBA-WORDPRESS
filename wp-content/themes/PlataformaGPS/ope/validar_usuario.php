<?PHP
   // Obtener valores enviados
   @$usuario = $_GET['usuario'];
   @$psw     = $_GET['clave'];

   /* Consultar que el nombre de usuario ingresado no esté registrado en el sistema */
   include("../conex/bd_usuarios.php");
   $Usuario = new usuarios();

   // Insertar datos
   $Valores = "'".$usuario."','".$psw."','".$nombre."','".$correo."',".$estado.",".$zonah.",".$rol;
   if( $Usuario->Insertar("usuarios","usuario,password,nombre,correo,activo,zonashorarias_id,roles_id",$Valores) ){
      echo "ok";
   }else{
      echo "error";
   }
   /* Eliminar en caso de funcinoar el archivo ope/ingresar.php */
?>