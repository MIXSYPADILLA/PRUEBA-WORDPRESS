<?PHP
/**
* Clase para conectar a la base de datos
*
* Clase que permite la interacción con la base de datos
*
  <- Anexar a archivo para manipular la información
* 
@version 1.0.3 Se cambió de private a protected el identificador de la variable $Resultado
@version 1.0.2 Se separó la función 'VerResultados($Antes,$Despues)' a un archivo por cada tabla
@version 1.0.1
@author Alan Jimenez Quiroz
@deprecated Algunas funciones fueron marcadas como obsoletas para la versión 5 de PHP
*/
   class conexionBD
   {
      //Conexión a la base de datos
      private  $BD_Usuario = "root";
      private  $BD_Clave   = "";
      private  $BD_Host    = "localhost:3306";
      private  $BD_Nombre  = "plataforma";

      /* --------------------------------------------
      private  $BD_Usuario = "pt000383_usrpfrm";
      private  $BD_Clave   = "RuP4m_3wa";
      private  $BD_Host    = "localhost";
      private  $BD_Nombre  = "pt000383_plataforma";
      -------------------------------------------- */

      // Variables para el resultado de la consulta
      private  $Conexion;
      public  $Filas = 0;
      public $Resultado;
      public $numFilas=0;

      private function Conectar()
      {
         $this->Conexion = mysql_connect($this->BD_Host, $this->BD_Usuario, $this->BD_Clave);
         //if( $this->Conexion )  echo "//Conexi&oacute;n Correcta.";
         mysql_select_db($this->BD_Nombre,$this->Conexion) or die ("\n <b>Error de conexi&oacute;n.</b>\n");
      }

      function Consulta($Campos, $Tabla, $Condicion)
      {
         // Limpiar valores anteriores
         $this->Conexion="";
         $this->Filas=0;
         $this->Resultado="";
         /* Consultar */
         $this->Conectar();
         $Consulta = "SELECT ". $Campos ." FROM ". $Tabla;
         if($Condicion != ""){
            $Consulta .= " WHERE ".$Condicion;
         }
         // Realizar consulta
         $this->Resultado = mysql_query($Consulta, $this->Conexion) or die("Error (". mysql_errno() .") ".mysql_error());
         // Contar las filas
         $this->numFilas = mysql_num_rows(@$this->Resultado);
         // Cerrar la conexión
         mysql_close($this->Conexion);
      }

      /* --------------------------------------------
         Función general de inserción de campos en
         la base de datos
      */
      function Insertar($Tabla,$Campos,$Valores)
      {
         $this->Conectar();
         $Inser = "INSERT INTO ". $Tabla ."(". $Campos .") VALUES (". $Valores .")";
         $resul = mysql_query($Inser,$this->Conexion);
         // Cerrar la conexión
         mysql_close($this->Conexion);
         return $resul;
      }

      /* --------------------------------------------
         Actualización de los campos de la base de datos
      */
      function Actualizar($Tabla, $nuevoValor, $condicion)
      {
         $this->Conectar();
         $Actualiza = "UPDATE ". $Tabla ." SET ". $nuevoValor ." WHERE ".$condicion;
         $this->Resultado = mysql_query($Actualiza, $this->Conexion) or die("Error (". mysql_errno() .") ".mysql_error());;
         // Cerrar la conexión
         mysql_close($this->Conexion);
         return $this->Resultado;
      }

      function Eliminar($Tabla,$Condicion)
      {
         $this->Conectar();
         $Elimina = "DELETE FROM ". $Tabla ." WHERE ". $Condicion;
         $resul = mysql_query($Elimina,$this->Conexion);
         // Cerrar la conexión
         mysql_close($this->Conexion);
         return $resul;
      }
   }
?>