<?PHP
/**
* Clase para manipular información de la tabla Roles
*
* Clase con elementos modificados para la interacción de la
* base de datos con la tabla Roles
*
  <- Se incluye el archivo bd_conex.php de forma automatica
* 
@version 1.0.1
@author Alan Jimenez Quiroz
*/
   include("bd_conex.php");
   class roles extends conexionBD
   {
      function JSON_Roles()
      {
         /* Array para los datos de JSON */
         $this->Consulta("*","roles","");
         $json = array();
         while( $res = mysql_fetch_assoc($this->Resultado) ){
            $json[] = array(
               'id'     => array($res['id']),
               'nombre' => array($res['nombre']),
               'ver'    => array($res['p_ver']),
               'ins'    => array($res['p_ins']),
               'upd'    => array($res['p_act']),
               'del'    => array($res['p_eli'])
            );
         }

         return json_encode($json);
      }
   }
?>