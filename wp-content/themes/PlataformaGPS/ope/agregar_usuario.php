<?PHP
   // Obtener valores enviados
   @$nombre  = $_GET['nombre'];
   @$correo  = $_GET['correo'];
   @$usuario = $_GET['usuario'];
   @$rol     = $_GET['rol'];
   @$zonah   = $_GET['zonah'];
   @$estado  = $_GET['estado'];
   @$psw     = $_GET['psw'];

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
?>