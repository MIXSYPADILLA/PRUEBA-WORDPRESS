<?PHP
/**
* Clase para manipular información de la tabla usuarios
*
* Clase con elementos modificados para la interacción de la
* base de datos con la tabla usuarios
*
  <- Se incluye el archivo bd_conex.php de forma automatica
* 
@version 1.0.2
@author Alan Jimenez Quiroz
*/
   include("bd_conex.php");
   class usuarios extends conexionBD
   {
      /* --------------------------------
         Listar a todos los usuarios en el sistema
         para llenar la tabla en la sección de
         administrar usuarios
      */
      function ListarUsuarios()
      {
         $Campos = "usuarios.id AS uid,usuarios.usuario AS usuario,usuarios.nombre AS unombre,usuarios.correo AS ucorreo,usuarios.activo AS uactivo,zonashorarias.id AS zid,zonashorarias.nombre AS zonah,roles.id AS rid,roles.nombre AS rol";
         $Cons = "usuarios INNER JOIN zonashorarias ON zonashorarias.id=zonashorarias_id INNER JOIN roles ON roles.id=roles_id";
         $this->Consulta($Campos,$Cons,"");
         // Contar la cantidad de resultados
         $this->Filas = mysql_num_rows($this->Resultado);
         if( $this->Filas > 0){
            for( $i=0; $i < $this->Filas; $i++ ) {
               // Obtener resultados
               $Columnas = mysql_fetch_assoc($this->Resultado);
               echo "\n<tr>"
                     //."<td>". $Columnas['id']       ."</td>"
                     ."<td>". $Columnas['usuario']  ."</td>"
                     ."<td>". $Columnas['unombre']   ."</td>"
                     ."<td>". $Columnas['ucorreo']   ."</td>"
                     ."<td>". $Columnas['rol'] ."</td>"
                     ."<td>". $Columnas['zonah'] ."</td>";
               if( $Columnas['uactivo']==0 ){ echo "<td> Inactivo </td>";}
               if( $Columnas['uactivo']==1 ){ echo "<td> Activo </td>";}
               echo "</tr>";
           }
         }
         else {
            echo "<tr><td colspan=\"6\"><center>No hay usuarios, agregue uno con el formulario de arriba</center></td></tr>";
         }
      }

      /* --------------------------------
         Buscar usuarios por nombre de usuario
      */
      function validarIngreso($Usuario, $Clave)
      {
         $this->Consulta("*","usuarios","usuario='".$Usuario."' AND password=md5('". $Clave ."')");
         // Contar la cantidad de resultados
         $this->Filas = mysql_num_rows($this->Resultado);
         if( $this->Filas > 0){
            // Regresar los datos del usuario
            $Columnas = mysql_fetch_assoc($this->Resultado);
            //echo "Datos de usuario: ". $Columnas['id'] .", ". $Columnas['usuario'].", ". $Columnas['password'].", ". $Columnas['nombre'].", ". $Columnas['correo'].", ". $Columnas['activo'].", ". $Columnas['zonashorarias_id'].", ". $Columnas['roles_id'].", ". $Columnas['gruposusuarios_id'];
            return $Columnas;
         }
         else {
            /* No se encontró al usuario */
            return false;
         }
      }

      /* --------------------------------
         Insertar usuario en la base de datos
      */
      function agregar($nombre,$correo,$usuario,$rol,$zonah,$estado,$psw)
      {
         $Valores = "'".$usuario."','".$psw."','".$nombre."','".$correo."',".$estado.",".$zonah.",".$rol;
         $this->Insertar("usuarios","usuario,password,nombre,correo,activo,zonashorarias_id,roles_id",$Valores);
      }

      /* --------------------------------
         Actualizar información de usuario
      */
      function modificar($nombre,$correo,$usuario,$rol,$zonah,$estado,$psw)
      {
         $Valores = "usuario='".$usuario."',password='".$psw."',nombre='".$nombre."',correo='".$correo."',activo=".$estado.",zonashorarias_id=".$zonah.",roles_id=".$rol;
         $this->Resultado = $this->Actualizar("usuarios",$Valores,"usuario='". $usuario ."'");
         return $this->Resultado;
      }

      function borrar($dato)
      {
         $this->Resultado = $this->Eliminar("usuarios","usuario='". $dato ."'");
         return $this->Resultado;
      }

      /* ---------------------------------
         Zona horaria y Roles de usuario
      */
      function ListaZonaHoraria()
      {
         $this->Consulta("*","zonashorarias","");
         // Contar la cantidad de resultados
         $this->Filas = mysql_num_rows($this->Resultado);
         if( $this->Filas > 0){
            for( $i=0; $i < $this->Filas; $i++ ) {
               // Obtener resultados
               $Columnas = mysql_fetch_assoc($this->Resultado);
               echo "<option value=\"".$Columnas['id']."\">".$Columnas['nombre']."</option>";
            }
         }else{
            echo "<option value=\"0\">No hay datos</option>";
         }
      }

      function ListaRol()
      {
         $this->Consulta("*","roles","");
         // Contar la cantidad de resultados
         $this->Filas = mysql_num_rows($this->Resultado);
         if( $this->Filas > 0){
            for( $i=0; $i < $this->Filas; $i++ ) {
               // Obtener resultados
               $Columnas = mysql_fetch_assoc($this->Resultado);
               echo "<option value=\"".$Columnas['id']."\">".$Columnas['nombre']."</option>";
            }
         }else{
            echo "<option value=\"0\">No hay datos</option>";
         }
      }
   }
?>